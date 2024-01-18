<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiCheckoutController;
use App\Http\Controllers\Api\ApiHomepageController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->name('api.v1.')->group(function(){

    Route::get('/banners', [ApiHomepageController::class, 'index']);
    Route::get('/all-categories', [ApiCategoryController::class, 'getAllCategories']);
    Route::get('/subcategories', [ApiCategoryController::class, 'getSubCategory']);
    Route::get('/products', [ApiProductController::class, 'getProducts']);
    // Route::get('/product/{slug}', [ApiProductController::class, 'getSingleProduct']);
    Route::get('/filter-attributes', [ApiProductController::class, 'getFilterAttributes']);
    Route::get('/attributes', [ApiProductController::class, 'getAttributes']);
    Route::get('/colors', [ApiProductController::class, 'getColors']);
    Route::get('/category/products/{slug}', [ApiProductController::class, 'categoryProducts']);
    Route::get('/featured-products', [ApiProductController::class, 'getFeaturedProducts']);
    Route::get('/sliders', [ApiHomepageController::class, 'sliders']);
    Route::get('/menu-banners', [ApiHomepageController::class, 'menuBanners']);
    Route::get('/flash-sale-products', [ApiHomepageController::class, 'getFlashSale']);
    Route::get('/flash-sales', [ApiProductController::class, 'getAllFlashSales']);
    Route::get('flash-sale/{slug}', [ApiProductController::class, 'getFlashSale']);
    Route::get('collections', [ApiHomepageController::class, 'getCollections']);
    Route::get('collection/{slug}', [ApiHomepageController::class, 'getCollection']);
    Route::get('category-by/{slug}', [ApiCategoryController::class, 'getProductsMainCat']);
    Route::get('/payment-methods', [ApiCheckoutController::class, 'getPaymentMethods']);
    Route::get('coupon-by/{code}', [ApiCheckoutController::class, 'getCoupon']);
    Route::get('countries', [ApiCheckoutController::class, 'getCountries']);
    Route::get('cities/{country_id}', [ApiCheckoutController::class, 'getCities']);

    Route::controller(ApiProductController::class)->group(function (){
        Route::get('/product-details/{id}','details');
        Route::post('find-variant','findVariant');
        Route::get('product-description/{id}','getDescription')->name('api.product.details');
        Route::post('check-product-stock','checkProductStock');
        Route::post('available-color-size','checkAvailableColorSize');
    });

    Route::controller(ApiOrderController::class)->group(function (){
        Route::post('check-coupon-code','checkCouponCode');
        Route::get('send-email','sendEmail');
        Route::post('order-submit','orderSubmit');
    });

    //Public routes
    Route::get('me', [MeController::class, 'getMe']);

    //Route group for authenticated users only
    Route::group(['middleware' => ['auth:api']], function(){
        Route::post('user/logout', [LoginController::class, 'logout']);
        // Routes for User Profile Update
        Route::put('setting/profile', [SettingController::class, 'updateProfile']);
        Route::put('setting/password', [SettingController::class, 'updatePassword']);

    });
    //Route for guests only
    Route::group(['middleware' => ['guest:api']], function(){
        // Routes for registered users
        Route::post('user/register', [RegisterController::class, 'register']);
        // Email verification for registered users
        Route::post('user/verification/verify/{user}', [VerificationController::class, 'verify'])->name('verification.user');
        Route::post('user/verification/resend', [VerificationController::class, 'resend']);
        // Routes for login users
        Route::post('user/login', [LoginController::class, 'login']);
        // Routes for password reset
        Route::post('user/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
        Route::post('user/password/reset', [ResetPasswordController::class, 'reset']);

    });


    //Scen2
    Route::middleware('auth:sanctum')->get('/user', function(Request $request ){
        return $request->user();
    });
    Route::controller(AuthController::class)->group(function(){
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::get('user-addresses/{token}', [ApiUserController::class, 'getUserAddresses']);
        Route::post('add-user-address', [ApiUserController::class, 'addUserAddress']);
        Route::post('delete-user-address', [ApiUserController::class, 'deleteUserAddress']);
        Route::get('user-orders/{userId}', [ApiOrderController::class, 'orderByUser']);
    });
});
