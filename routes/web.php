<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategorieController;
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
Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LogoutController::class, 'logout']);

// protected routes
Route::get('/', function () {
    return view('home.Index');
});
Route::resource('/bill', BillController::class);
Route::resource('/products', ProductController::class);
Route::resource('/categorie', CategorieController::class);

Route::group(['middleware' => ["auth:sanctum"]], function() {
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});