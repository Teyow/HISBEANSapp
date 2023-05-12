<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/menu', [App\Http\Controllers\modules\MenuController::class, 'index'])->name('menu');
Route::get('/orderPOS', [App\Http\Controllers\modules\OrderPOSController::class, 'index'])->name('orderPOS');
Route::get('/sales', [App\Http\Controllers\modules\SalesController::class, 'index'])->name('sales');
Route::get('/marketing', [App\Http\Controllers\modules\MarketingController::class, 'index'])->name('marketing');
Route::get('/inventory', [App\Http\Controllers\modules\InventoryController::class, 'index'])->name('inventory');
Route::get('/users', [App\Http\Controllers\modules\UsersController::class, 'index'])->name('users');
