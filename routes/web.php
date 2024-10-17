<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DemisionerController,
    FileController,
    MainController,
    NewsController,
    PermissionController,
    TypeController,
    UserController,
};
use App\Models\Demisioner;

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
Route::get('/{id}', [NewsController::class, 'look'])->name('read-news');
Route::group(['prefix' => 'wse'], function () {
    Route::get('/it', [MainController::class, 'it'])->name('it');
    Route::get('/projas', [MainController::class, 'projas'])->name('projas');
    Route::get('/pc', [MainController::class, 'pc'])->name('pc');
    Route::get('/robotik', [MainController::class, 'robotik'])->name('robotik');
    Route::get('/struktur', [MainController::class, 'struktur'])->name('struktur');
    Route::get('/demisioner', [MainController::class, 'demisioner'])->name('demisioner');
    Route::get('/demisioner/{id}', [DemisionerController::class, 'look'])->name('read-demis');
});

Route::middleware('guest')->group(function () {
    Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('/signin', [AuthController::class, 'signinAction'])->name('signinAction');
});
Route::middleware('auth:web')->group(function () {
    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');

    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'masters'], function () {
        Route::resource('users', UserController::class);
        Route::resource('demisioners', DemisionerController::class);
        Route::resource('news', NewsController::class);
        Route::post('news/toggle', [NewsController::class, 'toggle'])->name('news.toggle');
    });
    Route::group(['prefix' => 'settings'], function () {
        Route::resource('permissions', PermissionController::class);
        Route::post('permissions/toggle', [PermissionController::class, 'togglePermission'])->name('permission.toggle');
        
        Route::resource('types', TypeController::class);
        Route::resource('files', FileController::class);
    });
});
