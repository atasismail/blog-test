<?php

use App\Http\Controllers\AboneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DefaultController;
use App\Http\Controllers\TemaController;

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



Route::get('/', [TemaController::class, 'index'])->name('anasyafa');
Route::get('/kategori/{id}', [TemaController::class, 'kategori'])->name('kategori');

Route::get('/abone', [AboneController::class, 'index'])->name('abone');
Route::post('/aboneol', [AboneController::class, 'aboneol'])->name('aboneol');


// ADMİN PANEL
Route::prefix('admin')->group(
    function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware("login");
        Route::post('/login', [AuthController::class, 'logincontrol'])->name('logincontrol')->middleware('login');
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/register', [AuthController::class, 'registercontrol'])->name('registercontrol');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DefaultController::class, 'index'])->name('admin.index');
        Route::resource('/category', CategoryController::class)->middleware('admin');
        Route::resource('/blog', BlogController::class)->middleware('admin');
        Route::resource('/takip', AboneController::class)->middleware('admin');
    }
);
