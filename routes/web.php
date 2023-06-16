<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\modules\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\modules\InventoryController;
use App\Http\Controllers\modules\UsersController;
use App\Http\Controllers\modules\OrderPOSController;
use App\Http\Controllers\modules\SalesController;
use App\Http\Controllers\modules\MarketingController;
use App\Http\Controllers\Modules\CategoryController;
use App\Models\OrderPOS;
use Illuminate\Support\Facades\App;


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
    return view('auth.login');
});
// Route::post('/login', [LoginController::class, 'login'])->name('login');



Auth::routes();
//HOME
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');



//MENU-ITEM MENU
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/addMenu', [MenuController::class, 'addMenu'])->name('addMenu');
Route::post('/createMenu', [MenuController::class, 'create'])->name('createMenu');
Route::get('/editMenu/{id}', [MenuController::class, 'editMenu'])->name('editMenu');
Route::post('/updateMenu/{id}', [MenuController::class, 'updateMenu'])->name('updateMenu');
Route::post('/deleteMenu', [MenuController::class, 'deleteMenu'])->name('deleteMenu');


//MENU-CATEGORY
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/addCategory', [CategoryController::class, 'addCategory'])->name('addCategory');
Route::post('/createCategory', [CategoryController::class, 'create'])->name('createCategory');
Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::post('/updateCategory/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
Route::post('/deleteCategory', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');


//ORDER/POS
Route::get('/orderPOS', [OrderPOSController::class, 'index'])->name('orderPOS');
Route::post('/loginPINCODE', [OrderPOSController::class, 'loginPINCODE'])->name('loginPINCODE');
Route::post('/getSpecificAddons', [OrderPOSController::class, 'getSpecificAddons']);
Route::get('/OrderMenu', [OrderPOSController::class, 'OrderMenu'])->name('OrderMenu');
Route::get('/PayOrder', [OrderPOSController::class, 'PayOrder'])->name('PayOrder');
Route::get('/PrintReceipt', [OrderPOSController::class, 'PrintReceipt'])->name('PrintReceipt');
Route::post('/CreateOrder/{id}', [OrderPOSController::class, 'CreateOrder'])->name('CreateOrder');
Route::post('/CreateAddons', [OrderPOSController::class, 'CreateAddons'])->name('CreateAddons');
Route::post('/addOrder', [OrderPOSController::class, 'addOrder']);
Route::post('/addOrderItems', [OrderPOSController::class, 'addOrderItems']);


//SALES
Route::get('/sales', [SalesController::class, 'index'])->name('sales');


//INVENTORY
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/addItems', [InventoryController::class, 'addItem'])->name('addItems');
Route::post('/createItems', [InventoryController::class, 'create'])->name('createItems');
Route::get('/PrintInventory', [InventoryController::class, 'PrintInventory'])->name('PrintInventory');
Route::get('/editInventory/{id}', [InventoryController::class, 'editInventory'])->name('editInventory');
Route::post('/updateInventory/{id}', [InventoryController::class, 'updateInventory'])->name('updateInventory');
Route::post('/deleteInventory', [InventoryController::class, 'deleteInventory'])->name('deleteInventory');


//MARKETING-VOUCHER
Route::get('/vouchers', [MarketingController::class, 'vouchers'])->name('vouchers');
Route::get('/addVoucher', [MarketingController::class, 'addVoucher'])->name('addVoucher');
Route::post('/createVoucher', [MarketingController::class, 'create'])->name('createVoucher');
Route::get('/editVoucher/{id}', [MarketingController::class, 'editVoucher'])->name('editVoucher');
Route::post('/updateVoucher/{id}', [MarketingController::class, 'updateVoucher'])->name('updateVoucher');
Route::post('/deleteVoucher', [MarketingController::class, 'deleteVoucher'])->name('deleteVoucher');

//MARKETING-PROMOTIONS
Route::get('/promotions', [MarketingController::class, 'promotions'])->name('promotions');
Route::get('/AddPromotions', [MarketingController::class, 'AddPromotions'])->name('AddPromotions');
Route::post('/createPromotions', [MarketingController::class, 'createPromo'])->name('createPromo');
Route::get('/editPromo/{id}', [MarketingController::class, 'editPromo'])->name('editPromo');
Route::post('/updatePromo/{id}', [MarketingController::class, 'updatePromo'])->name('updatePromo');
Route::post('/deletePromo', [MarketingController::class, 'deletePromo'])->name('deletePromo');

//USERS MANAGEMENT
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/addusers', [UsersController::class, 'addusers'])->name('addusers');
Route::post('/createUser', [UsersController::class, 'create'])->name('createuser');
Route::get('/editUser/{id}', [UsersController::class, 'editUser'])->name('editUser');
Route::post('/updateUser/{id}', [UsersController::class, 'updateUser'])->name('updateUser');
Route::post('/deleteUser', [UsersController::class, 'deleteEmployee'])->name('deleteEmployee');
