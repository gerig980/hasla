<?php

use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\AttributeValueController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\FilterAttributeController;
use App\Http\Controllers\Backend\FilterAttributeValueController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\SizeGuideController;
//use App\Http\Controllers\Backend\SizeGuideValueController;
use App\Http\Controllers\Backend\CollectionController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\PosController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes / Admin Panel
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Dashboard
Route::get('dashboard', DashboardController::class)->name('dashboard');

//Roles
Route::resource('roles', RoleController::class);

//Users
Route::resource('users', UserController::class);

//Categories
Route::resource('categories', CategoryController::class);
Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);

//Attributes
Route::resource('attributes', AttributeController::class);
Route::resource('attribute-values', AttributeValueController::class);
Route::resource('filter-attributes', FilterAttributeController::class);
Route::resource('filter-attribute-values', FilterAttributeValueController::class);

//Products
Route::get('products', [ProductController::class, 'index'])->name('product.index');
Route::get('create-product', [ProductController::class, 'create'])->name('product.create');
Route::post('create-product-store', [ProductController::class, 'store'])->name('product.store');
Route::get('products/show-details', [ProductController::class, 'show'])->name('product.show');
Route::post('update-product-status', [ProductController::class, 'updateProductStatus']);
Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('update-product', [ProductController::class, 'update'])->name('product.update');
Route::put('product-status-change', [ProductController::class, 'statusChange'])->name('product.status.change');
Route::post('products/get-variants', [ProductController::class, 'variants'])->name('get-variants');
Route::post('products/get-variants-edit', [ProductController::class, 'variantsEdit'])->name('get-variants-edit');
Route::post('products/get-attribute-values', [ProductController::class, 'getAttributeValues'])->name('get-attribute-values');
Route::get('product-search', [ProductController::class, 'searchProduct'])->name('product.product-search');
Route::get('/product-find/{id}', [ProductController::class, 'productById']);

//Colors
Route::get('colors', [ColorController::class, 'index'])->name('colors');
Route::post('color-store', [ColorController::class, 'store'])->name('color.store');
Route::get('edit-color/{id}', [ColorController::class, 'edit'])->name('color.edit');
Route::put('color-update', [ColorController::class, 'update'])->name('color.update');
Route::delete('delete/colors/{id}', [ColorController::class, 'delete']);

//Countries
Route::resource('countries', CountryController::class);
Route::post('update-country-status', [CountryController::class, 'updateCountryStatus']);

//Cities
Route::resource('cities', CityController::class);
Route::post('update-city-status', [CityController::class, 'updateCityStatus']);

//Customers
Route::resource('customers', CustomerController::class);

//Size Guides
Route::resource('size-guides', SizeGuideController::class);
Route::get('sizeGuides/delete-sizeGuideValue/{id}', [SizeGuideController::class, 'deleteSizeGuideValue'])->name('delete.sizeGuideValue');
//Route::resource('size-guide-values', SizeGuideValueController::class);

//Collection
Route::resource('collections', CollectionController::class);

//Flash Sales
// Route::resource('flash-sales', FlashSaleController::class);
// Route::get('/product-price/{id}', [FlashSaleController::class, 'getProductPrice']);
// Route::post('update-flashSale-status', [FlashSaleController::class, 'updateFlashSaleStatus']);
// Route::get('flashSaleProducts/delete-flashSaleProduct/{id}', [FlashSaleController::class, 'deleteFlashSaleProduct'])->name('delete.flashSaleProduct');

Route::get('flash-sales', [FlashSaleController::class, 'index'])->name('flash-sales.index');
Route::get('flash-sales/create', [FlashSaleController::class, 'create'])->name('flash-sales.create');
Route::get('flash-sales/products/{id}', [FlashSaleController::class, 'flashSaleProducts'])->name('flash-sales.products');
Route::post('flash-sale/store', [FlashSaleController::class, 'store'])->name('flash-sales.store');
Route::post('flash-sale/product/store', [FlashSaleController::class, 'flashSaleProductStore'])->name('flash-sales.product.store');
Route::get('product/by/ajax', [FlashSaleController::class, 'productByAjax'])->name('product.by.ajax');

//Pos-system
Route::get('pos', [PosController::class, 'index'])->name('pos.index');

//Slider Routes
Route::get('sliders', [SliderController::class, 'index'])->name('sliders.index');
Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
Route::post('sliders', [SliderController::class, 'store'])->name('sliders.store');
Route::get('sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
Route::put('sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
Route::put('slider-status-change', [SliderController::class, 'statusChange'])->name('slider.status.change');
Route::delete('delete/sliders/{slider}', [CommonController::class, 'delete'])->name('sliders.destroy');

//Banners
Route::resource('banners', BannerController::class);

