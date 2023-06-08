<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\modules\mobile\AddOnsController;
use App\Http\Controllers\modules\mobile\MenuController;
use App\Http\Controllers\modules\mobile\OrderController;
use App\Http\Controllers\modules\mobile\UserController;
use App\Http\Controllers\modules\mobile\VoucherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|P
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout', [LoginController::class, 'mobileLogout']);
Route::post('/register', [RegisterController::class, 'mobileRegister']);
Route::post('/login', [LoginController::class, 'mobileLogin']);
Route::post("/editProfile", [UserController::class, 'editProfile']);

//Add ons
Route::get('/getAllAddOns', [AddOnsController::class, 'getAllAddOns']);
Route::post('/getItemAddOns', [OrderController::class, 'getItemAddOns']);

//Menu
Route::get('/getAllFeatured', [MenuController::class, 'getAllFeatured']);
Route::get('/getAllCategories', [MenuController::class, 'getAllCategories']);
Route::get('/getSpecificCategory/{category}', [MenuController::class, 'getSpecificCategory']);
Route::post('/getSpecificMenu', [MenuController::class, 'getSpecificMenu']);

//order
Route::post('/addToCart', [OrderController::class, 'addToCart']);
Route::post('/removeToCart', [OrderController::class, 'removeToCart']);
Route::post('/getUserCart', [OrderController::class, 'getUserCart']);
Route::post('/addOrder', [OrderController::class, 'addOrder']);
Route::post('/getUserPendingOrders', [OrderController::class, 'getUserPendingOrders']);
Route::post('/getUserOrders', [OrderController::class, 'getUserOrders']);
Route::post('/getAllCompletedOrders', [OrderController::class, 'getAllCompletedOrders']);
Route::post('/getSpecificOrder', [OrderController::class, 'getSpecificOrder']);
Route::post('/cancelOrder', [OrderController::class, 'cancelOrder']);

//voucher
Route::get('/useVoucher', [VoucherController::class, 'useVoucher']);

Route::group(['middleware' => ['auth:sanctum']], function () {
});
