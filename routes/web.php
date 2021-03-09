<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'middleware' => ['auth', 'isUser'],
], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
});

Route::group([
    'middleware' => ['auth', 'isAdmin'],
    'prefix' => 'admin'
], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('order', OrderController::class);
});
