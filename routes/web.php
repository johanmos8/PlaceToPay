<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/customer/reviewOrder/{order}', [CustomerController::class, 'reviewOrderStatus'])->middleware(['auth'])->name('customer.reviewOrder');
Route::get('/customer/create/{product}', [CustomerController::class, 'createOrder'])->middleware(['auth'])->name('customer.create');

Route::post('/customer/orderSummary/', [CustomerController::class, 'viewOrderSummary'])->middleware(['auth'])->name('customer.viewOrderSummary');
Route::post('/customer/save', [CustomerController::class, 'saveOrder'])->middleware(['auth'])->name('customer.save');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
