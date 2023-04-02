<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthLogin;
use App\Http\Middleware\IfAlreadyLogin;
use Illuminate\Support\Facades\Route;

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
    return view('customer.index');
})->name('index');
Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => [IfAlreadyLogin::class]], static function () {
    Route::get('/google/redirect', [AuthController::class, 'redirect'])->name('redirect');
    Route::get('/google/callback', [AuthController::class, 'callback'])->name('callback');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => [AuthAdmin::class]], static function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'warehouse', 'as' => 'warehouse.'], static function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
    });
});
