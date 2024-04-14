<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ForwarderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleTypeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['Admin'])->group(function (){
    Route::get('/admin/home', [HomeController::class, 'testHome'])->name('testHome');
    //User
    Route::resource('/admin/user', UserController::class)->except(['show']);;
    Route::post('/admin/user/downloadToCSV', [UserController::class, 'exportToCSV'])->name('user.export');
    Route::get('/admin/user/print', [UserController::class, 'print']);
    Route::post('/admin/user/cari', [UserController::class, 'cari'])->name('cari');
    Route::get('/admin/user/pilihCopy', [UserController::class, 'kopiData']);
    Route::get('/admin/user/copy/{id}', [UserController::class, 'copy']);
    Route::post('/admin/user/proses/', [UserController::class, 'prosesData'])->name('user.prosesData');
    //Product Category
    Route::resource('/admin/productCategory', ProductCategoryController::class);
    Route::post('/admin/productCategory/cari', [VehicleTypeController::class, 'cari'])->name('cariproductCategory');
    Route::get('/admin/productCategory/print', [VehicleTypeController::class, 'print']);
    Route::post('/admin/productCategory/downloadToCSV', [VehicleTypeController::class, 'exportToCSV'])->name('productCategory.export');
    //Vehicle Type
    Route::resource('/admin/vehicleType', VehicleTypeController::class);
    Route::post('/admin/vehicleType/cari', [VehicleTypeController::class, 'cari'])->name('cariVehicleType');
    Route::get('/admin/vehicleType/print', [VehicleTypeController::class, 'print']);
    Route::post('/admin/vehicleType/downloadToCSV', [VehicleTypeController::class, 'exportToCSV'])->name('vehicleType.export');
    //User Approval
    Route::resource('/admin/userApproval', ApprovalController::class);
    Route::post('/admin/vehicleType/cari', [VehicleTypeController::class, 'cari'])->name('cariVehicleType');
    Route::get('/admin/vehicleType/print', [VehicleTypeController::class, 'print']);
    Route::post('/admin/vehicleType/downloadToCSV', [VehicleTypeController::class, 'exportToCSV'])->name('vehicleType.export');
    //Product
    Route::resource('/admin/product', ProductController::class);
    //Salesman
    Route::resource('/admin/salesman', SalesmanController::class);
    //Customer
    Route::resource('/admin/customer', CustomerController::class);
    //Supplier
    Route::resource('/admin/supplier', SupplierController::class);
    //Warehouse
    Route::resource('/admin/warehouse', WarehouseController::class);
    Route::resource('/admin/forwarder', ForwarderController::class);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
