<?php

use App\Http\Controllers\FacturaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// auth routes
/* Route::resource('/login', LoginController::class);
Route::resource('/register', RegisterController::class); */

Auth::routes();

Route::resource('/facturation', FacturaController::class);

Route::post('/facturation/add/product', [App\Http\Controllers\FacturacionController::class, 'addProductToVent'])->name('addProduct');

Route::delete('/facturation/cancel/vent', [App\Http\Controllers\FacturacionController::class, 'cancelVent'])->name('cancelVent');

Route::delete('/facturation/product/delete', [App\Http\Controllers\FacturacionController::class, 'deleteProductToVent'])->name('deleteProductToVent');

Route::resource('/products', ProductController::class);
Route::resource('/categorie', CategorieController::class);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
