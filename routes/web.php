<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProductTrackController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserMessageController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\UserVendorRequestController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('flash-sale',[FlashSaleController::class, 'index'])->name('flash-sale');

/** Product Route */
Route::get('products',[FrontendProductController::class, 'productsIndex'])->name('products.index');
Route::get('product-detail/{slug}',[FrontendProductController::class, 'showProduct'])->name('product-detail');
Route::get('change-product-list-view',[FrontendProductController::class, 'changeListView'])->name('change-product-list-view');

/** Cart Route */
Route::post('add-to-cart',[CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-details',[CartController::class, 'cartDetails'])->name('cart-details');
Route::post('cart/update-quantity',[CartController::class, 'updateProductQty'])->name('cart.update-quantity');
Route::get('clear-cart',[CartController::class, 'clearCart'])->name('clear.cart');
Route::get('cart/remove-product/{rowId}',[CartController::class, 'RemoveProduct'])->name('cart.remove-product');
Route::get('cart-count',[CartController::class, 'getCartCount'])->name('cart-count');
Route::get('cart-products',[CartController::class, 'getCartProducts'])->name('cart-products');
Route::post('cart/remove-sidebar-product',[CartController::class, 'removeSidebarProduct'])->name('cart.remove-sidebar-product');
Route::get('cart/sidebar-product-total',[CartController::class, 'cartTotal'])->name('cart.sidebar-product-total');

Route::get('apply-coupon',[CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('coupon-calculation',[CartController::class, 'couponCalculation'])->name('coupon-calculation');

/** Newsletter Routes */
Route::post('newsletter-request', [NewsletterController::class, 'newsLetterRequest'])->name('newsletter-request');
Route::get('newsletter-verify/{token}', [NewsletterController::class, 'newsLetterEmailVerify'])->name('newsletter-verify');

/** Vendor page Routes */
Route::get('user/vendor', [HomeController::class, 'vendorPage'])->name('vendor.index');
Route::get('vendor-product/{id}', [HomeController::class, 'vendorProductsPage'])->name('vendor.products');

/** About Page pages */
Route::get('about',[PageController::class, 'about'])->name('about');

/** Terms and Condition Page pages */
Route::get('terms-and-conditions',[PageController::class, 'termsAndConditions'])->name('terms-and-conditions');

/** contact pages */
Route::get('contact',[PageController::class, 'contact'])->name('contact');
Route::post('contact',[PageController::class, 'handleContactForm'])->name('handle-contact-form');

/** Product Track pages */
Route::get('product-tracking',[ProductTrackController::class, 'index'])->name('product-tracking.index');

/** Blog Routes */
Route::get('blog-details/{slug}',[BlogController::class, 'blogDetails'])->name('blog-details');
Route::get('blog',[BlogController::class, 'blog'])->name('blog');

/** add product in wishlist */
Route::get('wishlist/add-product',[WishlistController::class, 'addToWishlist'])->name('wishlist.store');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');

    /** Message Route */
    Route::get('messages', [UserMessageController::class, 'index'])->name('messages.index');

    /** User Address Route */
    Route::resource('address', UserAddressController::class);

    /** Orders Route */
    Route::get('orders',[UserOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/show/{id}',[UserOrderController::class, 'show'])->name('orders.show');

    /** Wishlist Routes */
    Route::get('wishlist',[WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('wishlist/remove-product/{id}',[WishlistController::class, 'destroy'])->name('wishlist.destroy');

    /** Product Review User dashboard Routes */
    Route::get('reviews',[ReviewController::class, 'index'])->name('review.index');

    /** vendor request route */
    Route::get('vendor-request',[UserVendorRequestController::class, 'index'])->name('vendor-request.index');
    Route::post('vendor-request',[UserVendorRequestController::class, 'create'])->name('vendor-request.create');

    /** Chat Route */
    Route::post('send-message',[UserMessageController::class, 'sendMessage'])->name('send-message');
    Route::get('get-messages',[UserMessageController::class, 'getMessages'])->name('get-messages');

    /** Product Review Routes */
    Route::post('review',[ReviewController::class, 'create'])->name('review.create');

    /** blog comment routes */
    Route::post('blog-comment',[BlogController::class, 'comment'])->name('blog-comment');

    /** User checkout Route */
    Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('checkout/address-create', [CheckOutController::class, 'createAddress'])->name('checkout.address.create');
    Route::post('checkout/form-submit', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.form-submit');

    /** payment Route */
    Route::get('payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

    /** paypal Route */
    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

    /** stripe Route */
    Route::post('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');

    /** razorpay Route */
    Route::post('razorpay/payment', [PaymentController::class, 'payWithRazorPay'])->name('razorpay.payment');

    /** Cod Route */
    Route::get('cod/payment', [PaymentController::class, 'payWithCod'])->name('cod.payment');
});

