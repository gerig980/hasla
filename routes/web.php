<?php

use Whoops\Run;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Backend\PosController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\SizeGuideController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\CollectionController;
use App\Http\Controllers\Backend\AttributeValueController;
use App\Http\Controllers\Backend\FilterAttributeController;
use App\Http\Controllers\Backend\FilterAttributeValueController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\OrderStatusController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\EmailSendController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/all-products', [HomeController::class, 'index'])->name('all-products');
Route::get('/flash-sale/{slug}', [HomeController::class, 'index'])->name('front.flash-sale');
Route::get('/collection/{slug}', [HomeController::class, 'index'])->name('collection');
Route::get('/cart', [HomeController::class, 'index'])->name('cart');
Route::get('/checkout', [HomeController::class, 'index'])->name('checkout');
Route::get('/whoweare', [HomeController::class, 'index'])->name('whoweare');
Route::get('/faq', [HomeController::class, 'index'])->name('faq');
Route::get('/payment', [HomeController::class, 'index'])->name('payment');
Route::get('/terms', [HomeController::class, 'index'])->name('terms');
Route::get('/shop', [HomeController::class, 'index'])->name('shop');
Route::get('/transport', [HomeController::class, 'index'])->name('transport');
Route::get('/buy', [HomeController::class, 'index'])->name('buy');
Route::get('/order-email', [HomeController::class, 'index'])->name('order-email');
Route::get('/thank-you', [HomeController::class, 'index'])->name('thank-you');
Route::get('/user-login', [HomeController::class, 'index'])->name('user-login');
Route::get('/user-profile', [HomeController::class, 'index'])->name('user.profile');
Route::get('/about', [HomeController::class, 'index'])->name('about');
Route::get('/category/{slug}', [HomeController::class, 'index'])->name('category-by-slug');
// Route::get('/product/{slug}', [HomeController::class, 'index'])->where('path', '*')->name('product-details');
Route::get('/email-verification', [HomeController::class, 'index'])->name('email-verification');
Route::get('/user-verification', [HomeController::class, 'index'])->name('user-verification');
Route::get('/product/{id}', [HomeController::class, 'index'])->where('path', '*')->name('product-details');


Auth::routes(['verify' => true]);

// Route::group(['middleware'=>['auth']], function(){
//User Dashboard
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::post('/user/logout', [LoginController::class, 'userLogout'])->name('user.logout');
// });

Route::group(['prefix' => 'app', 'namespace' => 'App\Http\Controllers\Backend'], function () {

    //Login Route
    Route::get('/login/auth', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login/auth', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    Route::group(['middleware' => ['admin']], function () {
        //Dashboard route
        Route::get('/dashboard', [AdminController::class, 'index'])->name('app.dashboard');

        //Logout route
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        //Roles
        Route::resource('roles', RoleController::class);

        /*        Route::get('roles', [RoleController::class, 'index'])->name('app.roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('app.roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('app.roles.store');
        Route::delete('roles/{id}', [RoleController::class, 'delete'])->name('app.roles.delete');
        Route::put('roles/{id}', [RoleController::class, 'update'])->name('app.roles.update');*/

        //Users
        Route::resource('users', UserController::class);

        //admins
        Route::get('admins', [AdminController::class, 'indexAdmins'])->name('app.admins.index');
        Route::post('admins', [AdminController::class, 'storeAdmin'])->name('app.admins.store');
        Route::delete('admins/{id}', [AdminController::class, 'deleteAdmin'])->name('app.admins.delete');
        Route::put('admins/{id}', [AdminController::class, 'updateAdmin'])->name('app.admins.update');

        //Categories
        Route::resource('categories', CategoryController::class);
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);

        //Attributes
        Route::resource('attributes', AttributeController::class);
        Route::resource('attribute-values', AttributeValueController::class);
        Route::resource('filter-attributes', FilterAttributeController::class);
        Route::resource('filter-attribute-values', FilterAttributeValueController::class);

        //Products
        Route::get('products', [ProductController::class, 'index'])->name('app.product.index');
        Route::get('create-product', [ProductController::class, 'create'])->name('app.product.create');
        Route::post('create-product-store', [ProductController::class, 'store'])->name('app.product.store');
        Route::get('products/show-details/{id}', [ProductController::class, 'show'])->name('app.product.show');
        Route::post('update-product-status', [ProductController::class, 'updateProductStatus']);
        Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('app.product.edit');
        Route::match(['post', 'put'], 'update-product', [ProductController::class, 'update'])->name('app.product.update');
        Route::put('product-status-change/{id}', [ProductController::class, 'statusChange'])->name('app.product.status.change');
        Route::post('products/get-variants', [ProductController::class, 'variants'])->name('app.get-variants');
        Route::post('products/get-variants-edit', [ProductController::class, 'variantsEdit'])->name('app.get-variants-edit');
        Route::post('products/get-attribute-values', [ProductController::class, 'getAttributeValues'])->name('app.get-attribute-values');
        Route::get('product-search', [ProductController::class, 'searchProduct'])->name('app.product.product-search');
        Route::get('product-filter', [ProductController::class, 'filterProduct'])->name('app.product.product-filter');
        Route::get('/product-find/{id}', [ProductController::class, 'productById']);
        Route::get('/export-products',[ProductController::class,'exportProducts'])->name('export-products');
        Route::get('/export-products-sample',[ProductController::class,'exportProductsSample'])->name('export-products-sample');
        Route::post('/import-products',[ProductController::class,'importProducts'])->name('import-products');

        //Colors
        Route::get('colors', [ColorController::class, 'index'])->name('app.colors');
        Route::post('color-store', [ColorController::class, 'store'])->name('app.color.store');
        Route::get('edit-color/{id}', [ColorController::class, 'edit'])->name('app.color.edit');
        Route::put('color-update', [ColorController::class, 'update'])->name('app.color.update');
        Route::delete('delete/colors/{id}', [ColorController::class, 'delete'])->name('app.color.delete');

        //Coupons
        Route::get('coupons', [CouponController::class, 'index'])->name('coupons.index');
        Route::get('create-coupon', [CouponController::class, 'create'])->name('coupons.create');
        Route::post('coupon-store', [CouponController::class, 'store'])->name('coupon.store');
        Route::put('coupon-status-change', [CouponController::class, 'statusChange'])->name('coupon.status.change');
        Route::put('coupon-update/{coupon}', [CouponController::class, 'update'])->name('coupon.update');
        Route::put('coupon-delete/{id}', [CouponController::class, 'delete'])->name('coupon.delete');
        Route::get('coupon-edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
        Route::get('product/by/ajax', [CouponController::class, 'productByAjax'])->name('product.by.ajax');

        //Tags
        Route::resource('tags', TagController::class);

        //Banners
        Route::resource('banners', BannerController::class);
        Route::post('banner-status-change', [BannerController::class, 'statusChange']);

        //Countries
        Route::resource('countries', CountryController::class);
        Route::post('update-country-status', [CountryController::class, 'updateCountryStatus']);

        //Cities
        Route::resource('cities', CityController::class);
        Route::post('update-city-status', [CityController::class, 'updateCityStatus']);

        //Customers
        Route::resource('customers', CustomerController::class);
        Route::get('customers-read', [CustomerController::class, 'web'])->name('customers.web');
        Route::get('costumer-show/{id}', [CustomerController::class, 'show'])->name('customer.show');
        Route::get('costumer-web/{id}', [CustomerController::class, 'showweb'])->name('customer.showweb');
        Route::post('customer-status-change', [CustomerController::class, 'statusChange']);

        //Size Guides
        Route::resource('size-guides', SizeGuideController::class);
        Route::get('sizeGuides/delete-sizeGuideValue/{id}', [SizeGuideController::class, 'deleteSizeGuideValue'])->name('app.delete.sizeGuideValue');
        //Route::resource('size-guide-values', SizeGuideValueController::class);

        //Collection
        Route::resource('collections', CollectionController::class);

        //Flash Sales
        // Route::get('/product-price/{id}', [FlashSaleController::class, 'getProductPrice']);
        Route::post('update-flashSale-status', [FlashSaleController::class, 'updateFlashSaleStatus']);
        // Route::get('flashSaleProducts/delete-flashSaleProduct/{id}', [FlashSaleController::class, 'deleteFlashSaleProduct'])->name('app.delete.flashSaleProduct');

        Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
        Route::get('flash-sale/create', [FlashSaleController::class, 'create'])->name('flash-sale.create');
        Route::get('flash-sale/edit/{id}', [FlashSaleController::class, 'edit'])->name('flash-sale.edit');
        Route::put('flash-sale-update/{id}', [FlashSaleController::class, 'update'])->name('flash-sale.update');
        Route::get('flash-sale/products/{id}', [FlashSaleController::class, 'flashSaleProducts'])->name('flash-sale.products');
        Route::post('flash-sale/store', [FlashSaleController::class, 'store'])->name('flash-sale.store');
        // Route::post('flash-sale/product/store', [FlashSaleController::class, 'flashSaleProductStore'])->name('flash-sale.product.store');
        Route::post('/flash-sale/product_discount', [FlashSaleController::class, 'product_discount'])->name('flash-sale.product_discount');
        Route::get('delete-flashSaleProduct/{id}', [FlashSaleController::class, 'deleteFlashSaleProduct'])->name('flash-sale-product.delete');
        Route::delete('flash-sale-delete/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale.delete');

        //Pos-system
        Route::get('pos', [PosController::class, 'index'])->name('app.pos.index');
        Route::post('pos/store-order', [PosController::class, 'storeOrder'])->name('app.pos.store');
        Route::post('pos/store-customer', [PosController::class, 'storeCustomer'])->name('app.pos.storeCustomer');
        Route::get('pos/address-by-customer/{id}', [PosController::class, 'addressByCustomer']);
        Route::get('pos-search', [PosController::class, 'searchPos'])->name('app.pos.pos-search');

        //Slider Routes
        //Route::get('sliders', [SliderController::class, 'index'])->name('app.sliders.index');
        Route::get('sliders/create', [SliderController::class, 'create'])->name('app.sliders.create');
        Route::post('sliders', [SliderController::class, 'store'])->name('app.sliders.store');
        Route::get('sliders/{slider}/edit', [SliderController::class, 'edit'])->name('app.sliders.edit');
        Route::put('sliders/{slider}', [SliderController::class, 'update'])->name('app.sliders.update');
        Route::post('slider-status-change', [SliderController::class, 'statusChange'])->name('app.slider.status.change');
        Route::delete('delete/sliders/{slider}', [SliderController::class, 'destroy'])->name('app.sliders.destroy');

        //Orders
        Route::get('orders', [OrderController::class, 'index'])->name('app.orders.index');
        Route::get('order-filter', [OrderController::class, 'filterOrder'])->name('app.orders.order-filter');
        Route::get('order/{id}', [OrderController::class, 'showOrder'])->name('app.orders.show');
        Route::get('order-invoice/{orderCode}', [OrderController::class, 'invoiceOrder'])->name('app.orders.invoice');
        Route::get('order-preinvoice/{orderCode}', [OrderController::class, 'preInvoiceOrder'])->name('app.orders.preinvoice');
        Route::post('order/{id}/deliver', [OrderController::class, 'deliverOrder'])->name('app.orders.deliver');
        Route::put('change-order-status/{id}', [OrderController::class, 'changeStatus'])->name('app.orders.changeStatus');
        Route::get('order-statuses', [OrderStatusController::class, 'index'])->name('app.order-statuses.index');
        Route::post('order-statuses', [OrderStatusController::class, 'store'])->name('app.order-statuses.store');
        Route::put('order-statuses/{orderStatus}', [OrderStatusController::class, 'update'])->name('app.order-statuses.update');
        Route::delete('order-statuses/{orderStatus}', [OrderStatusController::class, 'destroy'])->name('app.order-statuses.destroy');
        Route::post('update-order-s-status', [OrderStatusController::class, 'updateOrderSStatus']);
        Route::get('/export-orders',[OrderController::class,'exportOrders'])->name('export-orders');

        //Payment Methods
        Route::get('payment-methods', [PaymentMethodController::class, 'index'])->name('app.payment-methods.index');
    });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
