<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
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
