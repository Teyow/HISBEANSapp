<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\modules\mobile\MenuController;
use App\Http\Controllers\modules\mobile\UserController;
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
Route::get('/getAllFeatured', [MenuController::class, 'getAllFeatured']);
Route::get('/getAllCategories', [MenuController::class, 'getAllCategories']);
Route::get('/getSpecificCategory/{category}', [MenuController::class, 'getSpecificCategory']);

Route::group(['middleware' => ['auth:sanctum']], function () {
});
