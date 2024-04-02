<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;

/** Admin Routes **/
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** Profile Routes **/
Route::get('profile', [ProfileController::class, 'index'])->name('profile'); // admin.profile
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update'); // admin.profile.update
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update'); // admin.password.update

/** Slider Routes **/
Route::resource('slider', SliderController::class);

/** Category Routes **/
Route::put('change-status',[CategoryController::class,'ChangeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

/** Sub Category Routes **/
Route::put('subcategory/change-status',[SubCategoryController::class,'ChangeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);

/** Child Category Routes **/
Route::put('child-category/change-status',[ChildCategoryController::class,'ChangeStatus'])->name('child-category.change-status');
Route::get('get-subcategories',[ChildCategoryController::class,'getSubcategories'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);

/** Brand Routes **/
Route::put('brand/change-status',[BrandController::class,'ChangeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

/** Vendor Profile Routes **/
Route::resource('vendor-profile', AdminVendorProfileController::class);

/** Products Routes **/
Route::get('product/get-subcategories',[ProductController::class,'getSubCategories'])->name('products.get-subcategories');
Route::get('product/get-child-categories',[ProductController::class,'getChildCategories'])->name('products.get-child-categories');
Route::put('product/change-status',[ProductController::class,'ChangeStatus'])->name('product.change-status');
Route::resource('products', ProductController::class);

/** Product Image Gallery route */
Route::resource('products-image-gallery', ProductImageGalleryController::class);

/** Product Variant route */
Route::put('products-variant/change-status',[ProductVariantController::class,'ChangeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);

/** Product Variant item route */
Route::get('products-variant-item/{productId}/{variantId}',[ProductVariantItemController::class,'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}',[ProductVariantItemController::class,'create'])->name('products-variant-item.create');
Route::post('products-variant-item',[ProductVariantItemController::class,'store'])->name('products-variant-item.store');

Route::get('products-variant-item-edit/{variantId}',[ProductVariantItemController::class,'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantId}',[ProductVariantItemController::class,'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantId}',[ProductVariantItemController::class,'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status',[ProductVariantItemController::class,'changeStatus'])->name('products-variant-item.change-status');

