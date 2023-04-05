<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthLogin;
use App\Http\Middleware\IfAlreadyLogin;
use App\Models\Product;
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
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/import', [ProductController::class, 'import'])->name('import');
        Route::post('/process_import', [ProductController::class, 'processImport'])->name('process_import');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'promotion', 'as' => 'promotion.'], static function () {
        Route::get('/', [PromotionController::class, 'index'])->name('index');
        Route::get('/create', [PromotionController::class, 'create'])->name('create');
        Route::post('/store', [PromotionController::class, 'store'])->name('store');
        Route::get('/edit/{promotion}', [PromotionController::class, 'edit'])->name('edit');
        Route::put('/update/{promotion}', [PromotionController::class, 'update'])->name('update');
        Route::delete('/destroy/{promotion}', [PromotionController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'hrm', 'as' => 'hrm.'], static function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('/store', [AdminController::class, 'store'])->name('store');
        Route::put('/cancel/{admin}', [AdminController::class, 'cancel'])->name('cancel');
    });

    Route::group(['prefix' => 'customer', 'as' => 'customer.'], static function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/show', [UserController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'customer-care', 'as' => 'customer-care.'], static function () {
        Route::get('/', [SupportController::class, 'index'])->name('index');
        Route::post('/{support}', [SupportController::class, 'response'])->name('response');
        Route::put('/filter/{support}', [SupportController::class, 'filter'])->name('filter');
    });

    Route::group(['prefix' => 'post', 'as' => 'post.'], static function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
        Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
        Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
    });


});
