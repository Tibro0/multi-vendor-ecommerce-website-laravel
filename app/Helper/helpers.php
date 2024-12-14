<?php

use App\Models\GeneralSetting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

/** Set Sidebar Item Active */
function setActive(array $route){
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    }
}

/** Check if Product Have Discount */
function checkDiscount($product){
    $currentDate = date('Y-m-d');

    if ($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    }
    return false;
}

/** calculate discount percent */
function calculateDiscountPercent($originalPrice, $discountPrice){
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;

    return round($discountPercent);
}

/** check the Product Type */
function productType($type){
    if ($type == 'new_arrival') {
        return 'New';
    }elseif ($type == 'featured_product') {
        return 'Featured';
    }elseif ($type == 'top_product') {
        return 'Top';
    }elseif ($type == 'best_product') {
        return 'Best';
    }else {
        return '';
    }
}

/** get total cart Amount */
function getCartTotal(){
    $total = 0;
        foreach(Cart::content() as $product){
            $total +=($product->price + $product->options->variants_total) * $product->qty;
        }
        return $total;
}

/** get payable total Amount */
function getMainCartTotal(){
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            $total = $subTotal - $coupon['discount'];
            return $total;
        }elseif($coupon['discount_type'] === 'percent'){
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            $total = $subTotal - $discount;
            return $total;
        }
    }else {
        return getCartTotal();
    }
}

/** get cart discount */
function getCartDiscount(){
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            return $coupon['discount'];
        }elseif($coupon['discount_type'] === 'percent'){
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            return $discount;
        }
    }else {
        return 0;
    }
}

/** get selected shipping fee */
function getShippingFee(){
    if (Session::has('shipping_method')) {
        return Session::get('shipping_method')['cost'];
    }else {
        return '0';
    }
}

/** get payable amount */
function getFinalPayableAmount(){
    return getMainCartTotal() + getShippingFee();
}

/** limit Text */
function limitText($text, $limit = 20){
    return Str::limit($text, $limit);
}

function getCurrencyIcon(){
    $icon = GeneralSetting::first();
    return $icon->currency_icon;
}
