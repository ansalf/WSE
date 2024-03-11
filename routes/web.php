<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'utama'])->name('utama');
Route::group(['prefix' => 'wse'], function () {
    Route::get('/it', [MainController::class, 'it'])->name('it');
    Route::get('/projas', [MainController::class, 'projas'])->name('projas');
    Route::get('/pc', [MainController::class, 'pc'])->name('pc');
    Route::get('/robotik', [MainController::class, 'robotik'])->name('robotik');
    Route::get('/struktur', [MainController::class, 'struktur'])->name('struktur');
});

Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
