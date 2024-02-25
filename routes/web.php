<?php

use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Public\ProductController;
use App\Http\Controllers\Public\SettingController;
use App\Http\Controllers\Public\TradeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::resource('products', ProductController::class);
Route::resource('trade', TradeController::class);
Route::resource('setting', SettingController::class);

Route::group(['as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::resource('products-am', ProductAdminController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
