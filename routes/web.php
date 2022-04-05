<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///////////////////////admin/////////////////////////////

//dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashboard', [AdminController::class, 'showDashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'loginDashboard']);

//category
Route::get('/add-category', [CategoryProductController::class, 'addCategory']);
Route::get('/edit-category/{category_id}', [CategoryProductController::class, 'editCategory']);
Route::get('/delete-category/{category_id}', [CategoryProductController::class, 'deleteCategory']);
Route::post('/save-category', [CategoryProductController::class, 'saveCategory']);
Route::post('/update-category/{category_id}', [CategoryProductController::class, 'updateCategory']);
Route::get('/all-category', [CategoryProductController::class, 'allCategory']);

//product
Route::get('/add-product', [ProductController::class, 'addProduct']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'editProduct']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'deleteProduct']);
Route::post('/save-product', [ProductController::class, 'saveProduct']);
Route::post('/update-product/{product_id}', [ProductController::class, 'updateProduct']);
Route::get('/all-product', [ProductController::class, 'allProduct']);

//order
Route::get('/manage-order', [OrderController::class, 'manageOrder']);
Route::get('/view-order/{order_id}', [AdminController::class, 'viewOrder']);

//coupon
Route::get('/manage-coupon', [CouponController::class, 'manageCoupon']);
Route::get('/unset-coupon','CouponController@unsetCoupon');
Route::get('/insert-coupon','CouponController@insertCoupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@deleteCoupon');
Route::post('/add-coupon','CouponController@addCoupon');

//user
Route::get('/manage-user', [UserController::class, 'manageUser']);

//banner
Route::get('/manage-banner', [BannerController::class, 'manageBanner']);

//blogs
Route::get('/manage-blog', [BlogController::class, 'manageBlog']);






////////////////////////user/////////////////////////////

//index
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/tim-kiem', [HomeController::class, 'search']);

//product
Route::get('/danh-muc/{category_id}', [CategoryProductController::class, 'showCategoryHome']);
Route::get('/chi-tiet/{product_id}', [ProductController::class, 'detailProduct']);

//Cart
Route::post('/update-cart-quantity',[CartController::class, 'updateCartQuantity']);
Route::post('/update-cart',[CartController::class, 'updateCart']);
Route::post('/save-cart',[CartController::class, 'saveCart']);
Route::post('/check-coupon',[CartController::class, 'checkCoupon']);
Route::get('/show-cart',[CartController::class, 'showCart']);
Route::get('/add-to-cart/{product_id}',[CartController::class, 'addCart'])->name('add-to-cart');
Route::get('/delete-cart',[CartController::class, 'deleteCart']);

//Checkout
Route::get('/login-checkout',[CheckoutController::class, 'loginCheckout']);
Route::post('/add-customer',[CheckoutController::class, 'addCustomer']);
Route::get('/checkout',[CheckoutController::class, 'checkout']);
Route::post('/save-checkout-customer',[CheckoutController::class, 'saveCheckout']);
Route::post('/payment',[CheckoutController::class, 'payment']);
Route::get('/logout-checkout',[CheckoutController::class, 'logoutCheckout']);
Route::post('/login-customer',[CheckoutController::class, 'loginCustomer']);

