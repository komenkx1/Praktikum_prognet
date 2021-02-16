<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}',[CheckoutController::class, 'cekongkir']);
Route::post('cekongkir',[CheckoutController::class, 'cekongkir'])->name('cekongkir');
Route::get('checkout', [checkoutController::class, 'index'])->name('checkout');
Route::get('getkota', [checkoutController::class, 'getkota'])->name('getkota');
//cart
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('add-cart', [CartController::class, 'store'])->name('add-cart');
Route::get('count-cart', [CartController::class, 'count'])->name('count-cart');
Route::get('total-cart', [CartController::class, 'totalprice'])->name('total-cart');
Route::get('product', [ProductController::class, 'index'])->name('product');

