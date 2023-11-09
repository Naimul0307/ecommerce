<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomeComponent;
use App\Livewire\ShopComponent;
use App\Livewire\SearchComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\CartComponent;
use App\Livewire\DetailsComponent;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\AdminCategoryComponent;
use App\Livewire\User\UserDashboardComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\Admin\AdminEditCategoryComponent;
use App\Livewire\Admin\AdminAddCategoryComponent;
use App\Livewire\Admin\AdminProductComponent;
use App\Livewire\Admin\AdminAddProductComponent;
use App\Livewire\Admin\AdminEditProductComponent;
use App\Livewire\Admin\AdminHomeSliderComponent;
use App\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Livewire\Admin\AdminHomeCategoryComponent;
use App\Livewire\Admin\AdminSaleComponent;
use App\Livewire\WishlistComponent;
use App\Livewire\ContactComponent;
use App\Livewire\Admin\AddCouponsComponent;
use App\Livewire\Admin\CouponsComponent;
use App\Livewire\Admin\EditCouponsComponent;
use App\Livewire\ThankyouComponenet;
use App\Livewire\Admin\AdminOrderComponent;
use App\Livewire\Admin\AdminOrderDetailsComponent;
use App\Livewire\User\UserOrderDetailsComponent;
use App\Livewire\User\UserOrdersComponent;
use App\Livewire\User\UserReviewComponent;
use App\Livewire\Admin\AdminContactComponent;
use App\Livewire\Admin\AdminSettingComponent;
use App\Livewire\User\UserChangePasswordComponent;
use App\Livewire\User\UserProfileComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}/{scategory_slug?}',CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');
Route::get('/thank-you', ThankyouComponenet::class)->name('thankyou');
Route::get('/contact',ContactComponent::class)->name('contact');

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */

//For User Or Customer
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/order/{order_id}',  UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.changepassword');
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
});

//For Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/admin-sale',AdminSaleComponent::class)->name('admin.sale');


    Route::get('/admin/coupons',CouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupons/add',AddCouponsComponent::class)->name('admin.addcoupons');
    Route::get('/admin/coupons/edit/{coupon_id}',EditCouponsComponent::class)->name('admin.editcoupons');

    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.ordersdetails');
    Route::get('/admin-contact',AdminContactComponent::class)->name('admin.contact');
    Route::get('/admin-setting',AdminSettingComponent::class)->name('admin.setting');
});
