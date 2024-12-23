<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminListController;
use App\Http\Controllers\Backend\AdminMessageController;
use App\Http\Controllers\Backend\AdminProductReviewController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogCommentController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CodSettingController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\FooterGridThreeController;
use App\Http\Controllers\Backend\FooterGridTwoController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RazorpaySettingController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscribersController;
use App\Http\Controllers\Backend\TermsAndConditionsController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorConditionController;
use App\Http\Controllers\Backend\VendorListController;
use App\Http\Controllers\Backend\VendorRequestController;
use App\Http\Controllers\Backend\WithdrawController;
use App\Http\Controllers\Backend\WithdrawMethodController;
use Illuminate\Support\Facades\Route;


/** Admin Route */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** Profile Route */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('update.password');

/** Slider Route */
Route::resource('slider', SliderController::class);

/** Category Route */
Route::put('change-status',[CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

/** Sub Category Route */
Route::put('subcategory/change-status',[SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);

/** child Category Route */
Route::put('child-category/change-status',[ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories',[ChildCategoryController::class, 'getSubCategory'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);

/** Brand Route */
Route::put('brand/change-status',[BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

/** Vendor Profile Route */
Route::resource('vendor-profile', AdminVendorProfileController::class);

/** Product Route */
Route::get('product/get-subcategories',[ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories',[ProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::put('product/change-status',[ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products', ProductController::class);

/** Product Image Gallery Route */
Route::resource('products-image-gallery', ProductImageGalleryController::class);

/** Product Variant Route */
Route::put('products-variant/change-status',[ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);

/** Product Variant Item Route */
Route::get('products-variant-item/{productId}/{variantId}',[ProductVariantItemController::class, 'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}',[ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item',[ProductVariantItemController::class, 'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}',[ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}',[ProductVariantItemController::class, 'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}',[ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status',[ProductVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');

/** reviews Routes */
Route::get('reviews',[AdminProductReviewController::class, 'index'])->name('reviews.index');
Route::put('reviews/change-status',[AdminProductReviewController::class, 'changeStatus'])->name('reviews.change-status');

/**Seller Product Route */
Route::get('seller-products',[SellerProductController::class, 'index'])->name('seller-products.index');
Route::get('seller-pending-products',[SellerProductController::class, 'pendingProducts'])->name('seller-pending-products.index');
Route::put('change-approve-status',[SellerProductController::class, 'changeApproveStatus'])->name('change-approve-status');

/**Flash Sale Route */
Route::get('flash-sale',[FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale',[FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product',[FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change',[FlashSaleController::class, 'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale-status',[FlashSaleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}',[FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');

/** Coupon All Route */
Route::put('coupons/change-status',[CouponController::class, 'changeStatus'])->name('coupons.change-status');
Route::resource('coupons', CouponController::class);

/** Shipping Rule All Route */
Route::put('shipping-rule/change-status',[ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

/**order Route */
Route::get('payment-status',[OrderController::class, 'changePaymentStatus'])->name('payment.status');
Route::get('order-status',[OrderController::class, 'changeOrderStatus'])->name('order.status');
Route::get('pending-orders',[OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders',[OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders',[OrderController::class, 'DroppedOffOrders'])->name('dropped-off-orders');
Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('canceled-orders', [OrderController::class, 'canceledOrders'])->name('canceled-orders');
Route::resource('order', OrderController::class);

/**order Transaction  Route */
Route::get('transaction',[TransactionController::class, 'index'])->name('transaction');

/** Withdraw Payments Route */
Route::resource('withdraw-method', WithdrawMethodController::class);
Route::get('withdraw',[WithdrawController::class, 'index'])->name('withdraw.index');
Route::get('withdraw/{id}',[WithdrawController::class, 'show'])->name('withdraw.show');
Route::put('withdraw/{id}',[WithdrawController::class, 'update'])->name('withdraw.update');

/** message route */
Route::get('messages', [AdminMessageController::class, 'index'])->name('messages.index');
Route::post('send-message',[AdminMessageController::class, 'sendMessage'])->name('send-message');
Route::get('get-messages',[AdminMessageController::class, 'getMessages'])->name('get-messages');

/**General Setting Route */
Route::get('settings',[SettingController::class, 'index'])->name('settings.index');
Route::put('general-setting-update',[SettingController::class, 'generalSettingUpdate'])->name('general-setting-update');
Route::put('email-setting-update',[SettingController::class, 'emailConfigSettingUpdate'])->name('email-setting-update');
Route::put('logo-setting-update',[SettingController::class, 'logoSettingUpdate'])->name('logo-setting-update');
Route::put('pusher-setting-update',[SettingController::class, 'pusherSettingUpdate'])->name('pusher-setting-update');


/**Home Page Setting Route */
Route::get('home-page-setting',[HomePageSettingController::class, 'index'])->name('home-page-setting');
Route::put('popular-category-section',[HomePageSettingController::class, 'updatePopularCategorySection'])->name('popular-category-section');
Route::put('product-slider-section-one',[HomePageSettingController::class, 'updateProductSliderSectionOne'])->name('product-slider-section-one');
Route::put('product-slider-section-two',[HomePageSettingController::class, 'updateProductSliderSectionTwo'])->name('product-slider-section-two');
Route::put('product-slider-section-three',[HomePageSettingController::class, 'updateProductSliderSectionThree'])->name('product-slider-section-three');

/** Blog category Routes */
Route::put('blog-category/change-status',[BlogCategoryController::class, 'changeStatus'])->name('blog-category.change-status');
Route::resource('blog-category', BlogCategoryController::class);

/** Blog Routes */
Route::put('blog/change-status',[BlogController::class, 'changeStatus'])->name('blog.change-status');
Route::resource('blog', BlogController::class);

/** Blog comment Routes */
Route::get('blog-comments',[BlogCommentController::class, 'index'])->name('blog-comments.index');
Route::delete('blog-comments/{id}/destroy',[BlogCommentController::class, 'destroy'])->name('blog-comments.destroy');


/** subscribers Route */
Route::get('subscribers',[SubscribersController::class, 'index'])->name('subscribers.index');
Route::delete('subscribers/{id}',[SubscribersController::class, 'destroy'])->name('subscribers.destroy');
Route::post('subscribers-send-mail',[SubscribersController::class, 'sendMail'])->name('subscribers-send-mail');

/** Advertisement Route */
Route::get('advertisement',[AdvertisementController::class, 'index'])->name('advertisement.index');
Route::put('advertisement/homepage-banner-section-one',[AdvertisementController::class, 'homepageBannerSectionOne'])->name('homepage-banner-section-one');
Route::put('advertisement/homepage-banner-section-two',[AdvertisementController::class, 'homepageBannerSectionTwo'])->name('homepage-banner-section-two');
Route::put('advertisement/homepage-banner-section-three',[AdvertisementController::class, 'homepageBannerSectionThree'])->name('homepage-banner-section-three');
Route::put('advertisement/homepage-banner-section-four',[AdvertisementController::class, 'homepageBannerSectionFour'])->name('homepage-banner-section-four');
Route::put('advertisement/product-page-banner',[AdvertisementController::class, 'productPageBanner'])->name('product-page-banner');
Route::put('advertisement/cart-page-banner',[AdvertisementController::class, 'cartPageBanner'])->name('cart-page-banner');

/** vendor request */
Route::get('vendor-request',[VendorRequestController::class, 'index'])->name('vendor-request.index');
Route::get('vendor-request/{id}/show',[VendorRequestController::class, 'show'])->name('vendor-request.show');
Route::put('vendor-request/{id}/change-status',[VendorRequestController::class, 'changeStatus'])->name('vendor-request.change-status');


/** customer list Route */
Route::get('customer',[CustomerListController::class, 'index'])->name('customer.index');
Route::put('customer/status-change',[CustomerListController::class, 'StatusChange'])->name('customer.status-change');
Route::get('vendor-list',[VendorListController::class, 'index'])->name('vendor-list.index');
Route::put('vendor-list/status-change',[VendorListController::class, 'StatusChange'])->name('vendor-list.status-change');
Route::get('vendor-condition',[VendorConditionController::class, 'index'])->name('vendor-condition.index');
Route::put('vendor-condition/update',[VendorConditionController::class, 'update'])->name('vendor-condition.update');

/** admin list Route */
Route::get('admin-list',[AdminListController::class, 'index'])->name('admin-list.index');
Route::put('admin-list/status-change',[AdminListController::class, 'StatusChange'])->name('admin-list.status-change');
Route::delete('admin-list/{id}',[AdminListController::class, 'destroy'])->name('admin-list.destroy');

/** manage user list */
Route::get('manage-user',[ManageUserController::class, 'index'])->name('manage-user.index');
Route::post('manage-user',[ManageUserController::class, 'create'])->name('manage-user.create');


/** About page route */
Route::get('about',[AboutController::class, 'index'])->name('about.index');
Route::put('about/update',[AboutController::class, 'update'])->name('about.update');

/** Terms and Conditions page route */
Route::get('terms-and-condition',[TermsAndConditionsController::class, 'index'])->name('terms-and-condition.index');
Route::put('terms-and-condition/update',[TermsAndConditionsController::class, 'update'])->name('terms-and-condition.update');


/** Footer Routes */
Route::resource('footer-info', FooterInfoController::class);
Route::put('footer-socials/change-status',[FooterSocialController::class, 'changeStatus'])->name('footer-socials.change-status');
Route::resource('footer-socials', FooterSocialController::class);
Route::put('footer-grid-two/change-status',[FooterGridTwoController::class, 'changeStatus'])->name('footer-grid-two.change-status');
Route::put('footer-grid-two/change-title',[FooterGridTwoController::class, 'changeTitle'])->name('footer-grid-two.change-title');
Route::resource('footer-grid-two', FooterGridTwoController::class);
Route::put('footer-grid-three/change-status',[FooterGridThreeController::class, 'changeStatus'])->name('footer-grid-three.change-status');
Route::put('footer-grid-three/change-title',[FooterGridThreeController::class, 'changeTitle'])->name('footer-grid-three.change-title');
Route::resource('footer-grid-three', FooterGridThreeController::class);


/**Payment Setting Route */
Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');
Route::resource('paypal-setting', PaypalSettingController::class);
Route::put('stripe-setting/{id}', [StripeSettingController::class, 'update'])->name('stripe-setting.update');
Route::put('razorpay-setting/{id}', [RazorpaySettingController::class, 'update'])->name('razorpay-setting.update');

Route::put('cod-setting/{id}', [CodSettingController::class, 'update'])->name('cod-setting.update');
