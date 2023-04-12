<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthLogin;
use App\Http\Middleware\IfAlreadyLogin;
use App\Http\Middleware\Role\AdminMaster;
use App\Http\Middleware\Role\CustomerCareEmployee;
use App\Http\Middleware\Role\MarketingEmployee;
use App\Http\Middleware\Role\ProductWarehouseEmployee;
use App\Http\Middleware\Role\SaleEmployee;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/product/{id}', [HomeController::class, 'showProduct'])->name('product.show');
Route::get('/post', [HomeController::class, 'post'])->name('post');
Route::get('/post/{post}', [HomeController::class, 'showPost'])->name('post.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart_summarize', [CartController::class, 'getCartSummarize'])->name('cart_summarize');
Route::post('/add_to_cart', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::get('/change_cart', [CartController::class, 'changeCart'])->name('change_cart');
Route::get('/remove_product', [CartController::class, 'removeProduct'])->name('remove_product');

Route::post('/add_promotion', [CartController::class, 'addPromotion'])->name('add_promotion');
Route::post('/add_information', [CartController::class, 'addInformation'])->name('add_information');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/pay', [CartController::class, 'pay'])->name('pay');
Route::post('/update_is_paid', [CartController::class, 'updateIsPaid'])->name('update_is_paid');
Route::post('/direct_pay', [CartController::class, 'directPay'])->name('direct_pay');

Route::get('/order_history', [CartController::class, 'orderHistory'])->name('order_history');
Route::get('/order_detail', [CartController::class, 'orderDetail'])->name('order_detail');

Route::get('/support', [HomeController::class, 'support'])->name('support');
Route::post('/send_support_request', [HomeController::class, 'sendSupportRequest'])->name('send_support_request');

Route::get('/test', function () {
    return view('mail.invite_admin');

    return json_encode(session()->all());
});

Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => [IfAlreadyLogin::class]], static function () {
    Route::get('/google/redirect', [AuthController::class, 'redirect'])->name('redirect');
    Route::get('/google/callback', [AuthController::class, 'callback'])->name('callback');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => [AuthAdmin::class]], static function () {
    Route::get('/', static function () {
        return redirect()->route('admin.order.index');
    })->name('index');
    Route::get('/toggle_dark_mode', function () {
        session()->put('dark_mode', ! session()->get('dark_mode'));
    })->name('toggle_dark_mode');

    Route::group(['prefix' => 'warehouse', 'as' => 'warehouse.', 'middleware' => [ProductWarehouseEmployee::class]], static function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/import', [ProductController::class, 'import'])->name('import');
        Route::post('/process_import', [ProductController::class, 'processImport'])->name('process_import');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'supplier', 'as' => 'supplier.', 'middleware' => [ProductWarehouseEmployee::class]], static function () {
        Route::get('/', [SupplierController::class, 'index'])->name('index');
        Route::get('/create', [SupplierController::class, 'create'])->name('create');
        Route::post('/store', [SupplierController::class, 'store'])->name('store');
        Route::get('/edit/{supplier}', [SupplierController::class, 'edit'])->name('edit');
        Route::put('/update/{supplier}', [SupplierController::class, 'update'])->name('update');
        Route::delete('/destroy/{supplier}', [SupplierController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'promotion', 'as' => 'promotion.', 'middleware' => [SaleEmployee::class]], static function () {
        Route::get('/', [PromotionController::class, 'index'])->name('index');
        Route::get('/create', [PromotionController::class, 'create'])->name('create');
        Route::post('/store', [PromotionController::class, 'store'])->name('store');
        Route::get('/edit/{promotion}', [PromotionController::class, 'edit'])->name('edit');
        Route::put('/update/{promotion}', [PromotionController::class, 'update'])->name('update');
        Route::delete('/destroy/{promotion}', [PromotionController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'hrm', 'as' => 'hrm.', 'middleware' => [AdminMaster::class]], static function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('/store', [AdminController::class, 'store'])->name('store');
        Route::put('/cancel/{admin}', [AdminController::class, 'cancel'])->name('cancel');
    });

    Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => [CustomerCareEmployee::class]], static function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/show', [UserController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'customer-care', 'as' => 'customer-care.', 'middleware' => [CustomerCareEmployee::class]], static function () {
        Route::get('/', [SupportController::class, 'index'])->name('index');
        Route::post('/{support}', [SupportController::class, 'response'])->name('response');
        Route::put('/filter/{support}', [SupportController::class, 'filter'])->name('filter');
    });

    Route::group(['prefix' => 'post', 'as' => 'post.', 'middleware' => [MarketingEmployee::class]], static function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
        Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
        Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'order', 'as' => 'order.', 'middleware' => [SaleEmployee::class]], static function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/show', [OrderController::class, 'show'])->name('show');
        Route::get('/print', [OrderController::class, 'print'])->name('print');
        Route::put('/update', [OrderController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'statistic', 'as' => 'statistic.', 'middleware' => [AdminMaster::class]], static function () {
        Route::get('/revenue', [StatisticController::class, 'revenue'])->name('revenue');
        Route::get('/product', [StatisticController::class, 'product'])->name('product');
        Route::get('/get_chart_revenue', [StatisticController::class, 'getChartRevenue'])->name('get_chart_revenue');
        Route::get('/get_chart_product', [StatisticController::class, 'getChartProduct'])->name('get_chart_product');
    });


});
