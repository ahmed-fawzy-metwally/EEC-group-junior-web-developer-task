<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;

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
    // 'middleware' => ['auth', 'isUser'],
], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
});

Route::group([
    // 'middleware' => ['auth', 'isAdmin'],
    'prefix' => 'admin'
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::post('/getProductsPerCategory',[CategoryController::class, 'getAllrelatedProducts']);
    Route::post('/checkCategoryFounded',[CategoryController::class, 'checkCategoryFounded']);

    Route::post('/checkProductFounded',[ProductController::class, 'checkProductFounded']);
    
    Route::post('/getSectionsPerDepartment',[DepartmentController::class, 'getAllrelatedSections']);
    Route::post('/checkDepartmentFounded',[DepartmentController::class, 'checkDepartmentFounded']);
    
    Route::post('/checkSectionFounded',[SectionController::class, 'checkSectionFounded']);

    Route::post('/checkUserFounded',[UserController::class, 'checkUserFounded']);

    Route::resource('order', OrderController::class);
});
