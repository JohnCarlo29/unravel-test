<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::post('/add-to-cart/{product}', [CartController::class, 'store'])->name('cart.add');
Route::get('/shopping-cart', [CartController::class, 'show'])->name('cart.show');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/pay', [CartController::class, 'pay'])->name('cart.pay');

Route::get('/transactions', [OrderController::class, 'index'])->name('customer.transaction');

Route::resource('/products', ProductController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
