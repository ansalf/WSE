<?php

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
Route::get('/wse/it', [MainController::class, 'it'])->name('it');
Route::get('/wse/projas', [MainController::class, 'projas'])->name('projas');
Route::get('/wse/pc', [MainController::class, 'pc'])->name('pc');
Route::get('/wse/robotik', [MainController::class, 'robotik'])->name('robotik');
Route::get('/wse/struktur', [MainController::class, 'struktur'])->name('struktur');