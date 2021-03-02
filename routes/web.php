<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailsController;
use App\Http\Controllers\ReviewProductController;


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

Route::post('cekongkir',[CheckoutController::class, 'cekongkir'])->name('cekongkir');
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
Route::get('/', [ProductController::class, 'index'])->name('product');
Route::get('detail-product/{products:id}', [ProductController::class, 'show'])->name('detail-product');
Route::post('beli', [ProductController::class, 'store'])->name('beli-product');
Route::get('filter-category', [ProductController::class, 'categoryFilter'])->name('filter-category');
Route::get('filter-search', [ProductController::class, 'searchFilter'])->name('filter-search');
Route::post('pagination/fetch', 'PaginationController@index')->name('pagination.fetch');

//review product
Route::get('review-product/{product:id}', [ReviewProductController::class, 'index'])->name('review-product');
Route::post('store-review', [ReviewProductController::class, 'store'])->name('store-review');