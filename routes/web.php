<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ShippingcostController;


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
    return view('welcome'); });
Route::resource('/customer', CustomerController::class);
Route::resource('/item', ItemController::class);
Route::resource('/voucher', VoucherController::class);
Route::resource('/shippingcost', ShippingcostController::class);

Route::delete('/delete-cart', [TransactionController::class, 'deletedb'])->name('delete-cart');

Route::resource('/dashboard', DashboardController::class, [
    'names' => [
        'index' => 'dashboard']]);


require __DIR__.'/auth.php';
