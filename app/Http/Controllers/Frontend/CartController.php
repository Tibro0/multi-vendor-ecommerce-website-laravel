<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /** show cart page */
    public function cartDetails(){
        $cartItems = Cart::content();

        if (count($cartItems) === 0) {
            Session::forget('coupon');
            toastr()->warning('Please Add some Products in your Cart for view the Cart Page.');
            return redirect()->route('home');
        }

        // banner add
        $cartpage_banner_section = Advertisement::where('key', 'cartpage_banner_section')->first();
        $cartpage_banner_section = json_decode($cartpage_banner_section?->value);
        return view('frontend.pages.cart-detail', compact('cartItems','cartpage_banner_section'));
    }

    /** Add Item To Cart */
    public function addToCart(Request $request){
        $product = Product::findOrFail($request->product_id);
        // check product quantity
        if ($product->qty === 0) {
            return response(['status' => 'error', 'message' => 'Product Stock Out.']);
        }elseif ($product->qty < $request->qty) {
            return response(['status' => 'error', 'message' => 'Quantity not Available in Our Stock.']);
        }

        $variants = [];
        $variantTotalAmount = 0;

        if ($request->has(['variants_items'])) {
            foreach ($request->variants_items as $item_id) {
                $variantsItem = ProductVariantItem::find($item_id);
                $variants[$variantsItem->productVariant->name]['name'] = $variantsItem->name;
                $variants[$variantsItem->productVariant->name]['price'] = $variantsItem->price;
                $variantTotalAmount += $variantsItem->price;
            }
        }

        // check Discount
        $productPrice = 0;

        if (checkDiscount($product)) {
            $productPrice = $product->offer_price;
        }else {
            $productPrice = $product->price;
        }

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        Cart::add($cartData);
        return response(['status' => 'success', 'message' => 'Added To Cart Successfully!']);
    }

    /** Update Product Quantity */
    public function updateProductQty(Request $request){
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);
        // check product quantity
        if ($product->qty === 0) {
            return response(['status' => 'error', 'message' => 'Product Stock Out.']);
        }elseif ($product->qty < $request->qty) {
            return response(['status' => 'error', 'message' => 'Quantity not Available in Our Stock.']);
        }

        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);
        return response(['status' => 'success', 'message' => 'Product Quantity Updated!', 'product_total' => $productTotal]);
    }

    /** get Product total */
    public function getProductTotal($rowId){
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;
        return $total;
    }

    /** Sidebar get cart total amount */
    public function cartTotal(){
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    /** Clear all Cart Products */
    public function clearCart(){
        Cart::destroy();
        return response(['status' => 'success', 'message' => 'Cart Cleared Successfully!']);
    }

    /** Remove one by one Products form Cart */
    public function RemoveProduct($rowId){
        Cart::remove($rowId);

        toastr()->success('Cart Cleared Successfully!');
        return redirect()->back();
    }

    /** Get cart count */
    public function getCartCount(){
        return Cart::content()->count();
    }

    /** get all sidebar cart Products */
    public function getCartProducts(){
        return Cart::content();
    }

    /** remove product form sidebar cart one by one */
    public function removeSidebarProduct(Request $request){
        Cart::remove($request->rowId);
        return response(['status' => 'success', 'message' => 'Product Removed Successfully!']);
    }

    /** Apply coupon */
    public function applyCoupon(Request $request)
    {
        if($request->coupon_code === null){
            return response(['status' => 'error', 'message' => 'Coupon filed is required']);
        }

        $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();

        if($coupon === null){
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        }elseif($coupon->start_date > date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        }elseif($coupon->end_date < date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon is expired']);
        }elseif($coupon->total_used >= $coupon->quantity){
            return response(['status' => 'error', 'message' => 'you can not apply this coupon']);
        }

        if($coupon->discount_type === 'amount'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount
            ]);
        }elseif($coupon->discount_type === 'percent'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount
            ]);
        }

        return response(['status' => 'success', 'message' => 'Coupon applied successfully!']);
    }

    /** Calculate coupon discount */
    public function couponCalculation()
    {
        if(Session::has('coupon')){
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            if($coupon['discount_type'] === 'amount'){
                $total = $subTotal - $coupon['discount'];
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            }elseif($coupon['discount_type'] === 'percent'){
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = $subTotal - $discount;
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
            }
        }else {
            $total = getCartTotal();
            return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
        }
    }

}
