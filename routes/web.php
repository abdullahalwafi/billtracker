<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as ADMIN;

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/admin')->group(function () {
    Route::get('/', [ADMIN\DashboardController::class, 'index']);

    // categories
    Route::prefix('/categories')->group(function () {
        Route::get('/', [ADMIN\CategoriesController::class, 'index']);
        Route::get('/form', [ADMIN\CategoriesController::class, 'create']);
        Route::post('/form/store', [ADMIN\CategoriesController::class, 'store']);
        Route::get('/form/{slug}', [ADMIN\CategoriesController::class, 'edit']);
        Route::put('/form/update/{slug}', [ADMIN\CategoriesController::class, 'update']);
        Route::delete('/destroy/{id}', [ADMIN\CategoriesController::class, 'destroy']);
        Route::get('/checkSlug', [ADMIN\CategoriesController::class, 'checkSlug']);
    });
    // products
    Route::prefix('/products')->group(function () {
        Route::get('/', [ADMIN\ProductsController::class, 'index']);
        Route::get('/form', [ADMIN\ProductsController::class, 'create']);
        Route::post('/form/store', [ADMIN\ProductsController::class, 'store']);
        Route::get('/form/{slug}', [ADMIN\ProductsController::class, 'edit']);
        Route::put('/form/update/{slug}', [ADMIN\ProductsController::class, 'update']);
        Route::delete('/destroy/{id}', [ADMIN\ProductsController::class, 'destroy']);
        Route::get('/checkSlug', [ADMIN\ProductsController::class, 'checkSlug']);
    });
});

