<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\TransactionController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [LoginController::class, 'create'])->middleware('guest:admin');
    Route::post('/login', [LoginController::class, 'store'])->name('login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{user}', [CustomerController::class, 'show'])->name('customers.show');

        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/{order}', [TransactionController::class, 'show'])->name('transactions.show');
        Route::resource('/products', AdminProductController::class);

        Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    });
});


Route::group(['middleware' => ['auth']], function () {
    Route::post('/add-to-cart/{product}', [CartController::class, 'store'])->name('cart.add');
    Route::get('/shopping-cart', [CartController::class, 'show'])->name('cart.show');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/pay', [CartController::class, 'pay'])->name('cart.pay');

    Route::get('/transactions', [OrderController::class, 'index'])->name('customer.transaction');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
