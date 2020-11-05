<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
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

Route::get('/old', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', [GeneralController::class, 'index']);
Route::get('/product/{id}', [GeneralController::class, 'singleProduct']);
Route::get('product', [GeneralController::class, 'allProducts']);
Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/admin/category/list-all', [CategoryController::class, 'listAll']);
Route::get('/admin/product/search', [ProductController::class, 'search']);
Route::resource('/admin/category', CategoryController::class);
Route::resource('/admin/product',ProductController::class);