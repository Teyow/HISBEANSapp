<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;

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



Auth::routes();
//HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//MENU-ITEM MENU
Route::get('/menu', [App\Http\Controllers\modules\MenuController::class, 'index'])->name('menu');
Route::get('/addMenu', [App\Http\Controllers\modules\MenuController::class, 'addMenu'])->name('addMenu');
Route::post('/createMenu', [App\Http\Controllers\modules\MenuController::class, 'create'])->name('createMenu');
Route::post('/deleteMenu', [App\Http\Controllers\modules\MenuController::class, 'deleteMenu'])->name('deleteMenu');

//MENU-CATEGORY
Route::get('/category', [App\Http\Controllers\modules\CategoryController::class, 'index'])->name('category');
Route::get('/addCategory', [App\Http\Controllers\modules\CategoryController::class, 'addCategory'])->name('addCategory');
Route::post('/createCategory', [App\Http\Controllers\Modules\CategoryController::class, 'create'])->name('createCategory');

//ORDER/POS
Route::get('/orderPOS', [App\Http\Controllers\modules\OrderPOSController::class, 'index'])->name('orderPOS');

//SALES
Route::get('/sales', [App\Http\Controllers\modules\SalesController::class, 'index'])->name('sales');

//INVENTORY
Route::get('/inventory', [App\Http\Controllers\modules\InventoryController::class, 'index'])->name('inventory');
Route::get('/addItems', [App\Http\Controllers\modules\InventoryController::class, 'addItem'])->name('addItems');
Route::post('/createItems', [App\Http\Controllers\modules\InventoryController::class, 'create'])->name('createItems');
//MARKETING
Route::get('/marketing', [App\Http\Controllers\modules\MarketingController::class, 'index'])->name('marketing');

//MARKETING-VOUCHER
Route::get('/vouchers', [App\Http\Controllers\modules\MarketingController::class, 'vouchers'])->name('vouchers');
Route::get('/addVoucher', [App\Http\Controllers\modules\MarketingController::class, 'addVoucher'])->name('addVoucher');
Route::post('/createVoucher', [App\Http\Controllers\modules\MarketingController::class, 'create'])->name('createVoucher');
Route::post('/deleteVoucher', [App\Http\Controllers\modules\MarketingController::class, 'deleteVoucher'])->name('deleteVoucher');
//Route::post('/viewVoucher', [App\Http\Controllers\modules\MarketingController::class, 'viewVoucher'])->name('viewVoucher');


//MARKETING-PROMOTIONS
Route::get('/promotions', [App\Http\Controllers\modules\MarketingController::class, 'promotions'])->name('promotions');
Route::get('/AddPromotions', [App\Http\Controllers\modules\MarketingController::class, 'AddPromotions'])->name('AddPromotions');



//USERS MANAGEMENT
Route::get('/users', [App\Http\Controllers\modules\UsersController::class, 'index'])->name('users');
Route::get('/addusers', [App\Http\Controllers\modules\UsersController::class, 'addusers'])->name('addusers');
Route::post('/createUser', [App\Http\Controllers\modules\UsersController::class, 'create'])->name('createuser');
//Route::post('/createUser', [App\Http\Controllers\modules\UsersController::class, 'usersView'])->name('usersView');
Route::post('/deleteUser', [App\Http\Controllers\modules\UsersController::class, 'deleteEmployee'])->name('deleteEmployee');
