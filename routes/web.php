<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class)->only(['index', 'show']);
    Route::resource('transactions', TransactionController::class)->only(['index', 'show']);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


require __DIR__.'/auth.php';
