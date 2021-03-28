<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailsController;
use App\Http\Controllers\ReviewProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ResponseController;
use App\Http\Controllers\Admin\ProductImagesController;

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



//transaksi
Route::get('detail-transaksi/{transactions:id}', [TransactionDetailsController::class, 'index'])->name('detail-transaksi');
Route::get('transaksi', [TransactionController::class, 'index'])->name('transaksi');
Route::put('upload-bukti/{transactions:id}', [TransactionController::class, 'update'])->name('upload-bukti');
Route::put('cancel/{transactions:id}', [TransactionController::class, 'cancel'])->name('cancel');
Route::put('verifikasi-barang/{transactions:id}', [TransactionController::class, 'verifbarang'])->name('verif-barang-diterima');

//ongkir
Route::post('cekongkir', [CheckoutController::class, 'cekongkir'])->name('cekongkir');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout-all', [CheckoutController::class, 'store'])->name('checkout-all');
Route::get('getkota', [CheckoutController::class, 'getkota'])->name('getkota');

//cart
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('add-cart', [CartController::class, 'store'])->name('add-cart');
Route::post('update-cart', [CartController::class, 'update'])->name('update-cart');
Route::get('count-cart', [CartController::class, 'count'])->name('count-cart');
Route::get('total-cart', [CartController::class, 'totalprice'])->name('total-cart');
Route::delete('delete-cart', [CartController::class, 'destroy'])->name('delete-cart');
Route::delete('delete/{cart:id}', [CartController::class, 'destroy'])->name('delete');

//product
Route::get('/', [HomeController::class, 'index'])->name('product');
Route::get('detail-product/{products:id}', [HomeController::class, 'show'])->name('detail-product');
Route::post('beli', [HomeController::class, 'store'])->name('beli-product');
Route::get('filter-category', [HomeController::class, 'categoryFilter'])->name('filter-category');
Route::get('filter-search', [HomeController::class, 'searchFilter'])->name('filter-search');
Route::post('pagination/fetch', 'PaginationController@index')->name('pagination.fetch');

//review product
Route::get('review-product/{product:id}', [ReviewProductController::class, 'index'])->name('review-product');
Route::post('store-review', [ReviewProductController::class, 'store'])->name('store-review');

//admin

//dashboard
Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
//category
Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
Route::post('/admin/category/add/store', [CategoryController::class, 'store'])->name('store-category');
Route::put('/admin/category/update/{category:id}', [CategoryController::class, 'update'])->name('update-category');
Route::delete('/admin/category/delete/{category:id}', [CategoryController::class, 'destroy'])->name('delete-category');
//product
Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
Route::get('/admin/product/add', [ProductController::class, 'create'])->name('add-product');
Route::get('/admin/product/edit/{product:id}', [ProductController::class, 'edit'])->name('edit-product');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('store-product');
Route::put('/admin/product/update/{product:id}', [ProductController::class, 'update'])->name('update-product');
Route::delete('/admin/product/destroy/{product:id}', [ProductController::class, 'destroy'])->name('destroy-product');
Route::get('/admin/product/show/{product:id}', [ProductController::class, 'show'])->name('show-product');

//product image
Route::delete('/admin/product/productimage/destroy/{productImages:id}', [ProductImagesController::class, 'destroy'])->name('thumbnail-destroy');
Route::post('/admin/product/productimage/store', [ProductImagesController::class, 'store'])->name('thumbnail-store');

//discount admin
Route::get('/admin/discount/{product:id}', [ProductController::class, 'discounts'])->name('discounts');
Route::delete('/admin/discount/destroy/{discounts:id}', [ProductController::class, 'discounts_destroy'])->name('discounts-destroy');
Route::post('/admin/discount/store', [ProductController::class, 'discounts_store'])->name('discounts-store');

//respond
Route::post('/admin/product/respond', [ResponseController::class, 'store'])->name('respond-product');
