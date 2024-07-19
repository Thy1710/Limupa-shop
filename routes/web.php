<?php
// Site
use App\Http\Controllers\frontend\AboutusController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\ProductDetailController;
use App\Http\Controllers\frontend\PromotionController;
use App\Http\Controllers\frontend\RegisterContorller;
use App\Http\Controllers\frontend\ShopController;
// Admin
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\LogonController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthenticate;
// Route Site

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('category', [ShopController::class, 'index'])->name('category');
Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('about-us', [AboutusController::class, 'index'])->name('about-us');
Route::get('product-detail/{id}', [ProductDetailController::class, 'index'])->name('product-detail');
// Cart
Route::prefix('cart')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('add-cart',[CartController::class,'add'])->name('add-cart');
    Route::post('remove-cart/{id}',[CartController::class,'remove'])->name('remove-cart');
    Route::post('update-cart',[CartController::class,'update'])->name('update-cart');
});

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('postLogin');
Route::get('register', [RegisterContorller::class, 'index'])->name('register');
Route::post('register',[RegisterContorller::class,'register'])->name('postRegister');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('promotion', [PromotionController::class, 'index'])->name('promotion');

// Route Admin
Route::get('logon',[LogonController::class,'index'])->name('logon');
Route::post('logon',[LogonController::class,'postLogon'])->name('postLogon');
Route::get('sign-out',[LogonController::class,'sign_out'])->name('sign-out');
Route::prefix('admin')->middleware(AdminAuthenticate::class)->group(function () {
    Route::get('/', [DashboardController::class,'view_dashboard'])->name('admin.view_dashboard');
    // Category
    Route::prefix('categories')->group(function(){
        Route::get('/', [CategoryController::class, 'view_categories_list'])->name('categories-list');
        Route::get('add-categories', [CategoryController::class, 'create'])->name('form-add-categories');
        Route::post('add-categories',[CategoryController::class,'store'])->name('add-categories');
        Route::get('delete-categories/{id}',[CategoryController::class,'destroy'])->name('delete-categories');
        Route::get('edit-categories/{id}',[CategoryController::class,'edit'])->name('edit-categories');
        Route::post('update-categories/{id}',[CategoryController::class,'update'])->name('update-categories');
    });
    // Product
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'view_product_list'])->name('product-list');
        Route::get('add-product',[ProductController::class,'create'])->name('form-add-product');
        Route::post('add-product',[ProductController::class,'store'])->name('add-product');
        Route::get('delete-product/{id}',[ProductController::class,'destroy'])->name('delete-product');
        Route::get('edit-product/{id}',[ProductController::class,'edit'])->name('edit-product');
        Route::post('update-product/{id}',[ProductController::class,'update'])->name('update-product');
    });

    Route::get('dashboard', [DashboardController::class, 'view_dashboard'])->name('dashboard');
});


