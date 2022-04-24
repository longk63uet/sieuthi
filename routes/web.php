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
use Illuminate\Support\Facades\App;

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

Route::post('/export-csv',[CategoryProductController::class, 'export_csv']);
Route::post('/import-csv',[CategoryProductController::class, 'import_csv']);

//blog category
Route::get('/add-blog-category', [BlogController::class, 'addBlogCategory']);
Route::get('/edit-blog-category/{blogcategory_id}', [BlogController::class, 'editBlogCategory']);
Route::get('/delete-blog-category/{blogcategory_id}', [BlogController::class, 'deleteBlogCategory']);
Route::post('/save-blog-category', [BlogController::class, 'saveBlogCategory']);
Route::post('/update-blog-category/{blogcategory_id}', [BlogController::class, 'updateBlogCategory']);
Route::get('/all-blog-category', [BlogController::class, 'allBlogCategory']);

Route::post('/blogcategory-export-csv',[BlogController::class, 'export_csvBlogCategory']);
Route::post('/blogcategory-import-csv',[BlogController::class, 'import_csvBlogCategory']);

//product
Route::get('/add-product', [ProductController::class, 'addProduct']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'editProduct']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'deleteProduct']);
Route::post('/save-product', [ProductController::class, 'saveProduct']);
Route::post('/update-product/{product_id}', [ProductController::class, 'updateProduct']);
Route::get('/all-product', [ProductController::class, 'allProduct']);

//comment
Route::post('/load-comment', [ProductController::class, 'loadComment']);
Route::post('/send-comment', [ProductController::class, 'sendComment']);

//rating
Route::post('/rating', [ProductController::class, 'rating']);


//order
Route::get('/manage-order', [OrderController::class, 'manageOrder']);
Route::get('/view-order/{order_id}', [OrderController::class, 'viewOrder']);
Route::get('/delete-order/{order_id}',[OrderController::class, 'deleteOrder']);
Route::get('/print-order/{order_detail_id}',[OrderController::class, 'printOrder']);

//coupon
Route::get('/manage-coupon', [CouponController::class, 'manageCoupon']);

Route::get('/insert-coupon',[CouponController::class, 'insertCoupon']);
Route::get('/delete-coupon/{coupon_id}',[CouponController::class, 'deleteCoupon']);
Route::post('/add-coupon',[CouponController::class, 'addCoupon']);

//user
Route::get('/manage-user', [UserController::class, 'manageUser']);

//banner
Route::get('/manage-banner', [BannerController::class, 'manageBanner']);
Route::get('/add-banner', [BannerController::class, 'addBanner']);
Route::post('/insert-banner', [BannerController::class, 'insertBanner']);
Route::get('/unactive-banner/{banner_id}', [BannerController::class, 'unactiveBanner']);
Route::get('/active-banner/{banner_id}', [BannerController::class, 'activeBanner']);
Route::get('/delete-banner/{banner_id}', [BannerController::class, 'deleteBanner']);

//blogs
Route::get('/manage-blog', [BlogController::class, 'manageBlog']);
Route::get('/insert-blog', [BlogController::class, 'insertBlog']);
Route::post('/add-blog', [BlogController::class, 'addBlog']);
Route::get('/delete-blog/{blog_id}', [BlogController::class, 'deleteBlog']);
Route::get('/edit-blog/{blog_id}', [BlogController::class, 'editBlog']);
Route::post('/update-blog', [BlogController::class, 'updateBlog']);







////////////////////////user/////////////////////////////

Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'vi', 'fr'])) {
        abort(400);
    }
 
    App::setLocale($locale);
 
    return redirect()->back();
});

//index
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/tim-kiem', [HomeController::class, 'search']);

Route::get('/add-to-wishlist/{product_id}',[HomeController::class, 'addWishlist'])->name('add-to-wishlist');

//send email
Route::get('/send-mail', [HomeController::class, 'sendMail']);

//product
Route::get('/danh-muc/{category_id}', [CategoryProductController::class, 'showCategoryHome']);
Route::get('/chi-tiet/{product_id}', [ProductController::class, 'detailProduct']);

//market
Route::get('/market', [HomeController::class, 'market']);


//Blogs 
Route::get('/blogs', [BlogController::class, 'blogs']);
Route::get('/blog/{blog_id}', [BlogController::class, 'blogdetail']);




//contact
Route::get('/contact', [HomeController::class, 'contact']);


//Cart
Route::post('/save-cart-all',[CartController::class, 'saveCartAll']);
Route::get('/show-cart',[CartController::class, 'showCart']);
Route::get('/add-to-cart/{product_id}',[CartController::class, 'addCart'])->name('add-to-cart');
Route::get('/delete-cart/{product_id}',[CartController::class, 'deleteCart']);

//wishlist
Route::get('/show-wishlist',[HomeController::class, 'showWishlist']);
Route::get('/remove-wishlist/{product_id}',[HomeController::class, 'removeWishlist']);

//Checkout
Route::get('/login-checkout',[CheckoutController::class, 'loginCheckout']);
Route::post('/add-user',[CheckoutController::class, 'adduser']);
Route::get('/checkout',[CheckoutController::class, 'checkout']);
Route::post('/save-checkout-user',[CheckoutController::class, 'saveCheckout']);
Route::get('/payment',[CheckoutController::class, 'payment']);
Route::get('/logout-checkout',[CheckoutController::class, 'logoutCheckout']);
Route::post('/login-user',[CheckoutController::class, 'loginuser']);
Route::post('/select-delivery',[CheckoutController::class, 'selectDelivery']);
Route::get('/select-city/{id}',[CheckoutController::class, 'selectCity']);

//coupon
Route::post('/check-coupon',[CouponController::class, 'checkCoupon']);
Route::get('/unset-coupon',[CouponController::class, 'unsetCoupon']);