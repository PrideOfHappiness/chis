<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ForwarderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NavbarController;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['Admin'])->group(function (){
    Route::get('/admin/home', [HomeController::class, 'testHome'])->name('testHome');
    //User
    Route::resource('/admin/user', UserController::class)->except(['show']);
    Route::post('/admin/user/downloadToCSV', [UserController::class, 'exportToCSV'])->name('user.export');
    Route::get('/admin/user/print', [UserController::class, 'print']);
    Route::post('/admin/user/cari', [UserController::class, 'cari'])->name('cari');
    Route::get('/admin/user/pilihCopy', [UserController::class, 'kopiData']);
    Route::get('/admin/user/copy/{id}', [UserController::class, 'copy']);
    Route::post('/admin/user/proses/', [UserController::class, 'prosesData'])->name('user.prosesData');
    //Product Category
    Route::resource('/admin/productCategory', ProductCategoryController::class)->except(['show']);
    Route::post('/admin/productCategory/cari', [ProductCategoryController::class, 'cari'])->name('cariProductCategory');
    Route::get('/admin/productCategory/print', [ProductCategoryController::class, 'print']);
    Route::post('/admin/productCategory/downloadToCSV', [ProductCategoryController::class, 'exportToCSV'])->name('productCategory.export');
    Route::get('/admin/productCategory/getimport', [ProductCategoryController::class, 'getImport'])->name('imporProductCategory');
    Route::post('/admin/productCategory/import', [ProductCategoryController::class, 'imporData']);
    //Vehicle Type
    Route::resource('/admin/vehicleType', VehicleTypeController::class)->except(['show']);
    Route::post('/admin/vehicleType/cari', [VehicleTypeController::class, 'cari'])->name('cariVehicleType');
    Route::get('/admin/vehicleType/print', [VehicleTypeController::class, 'print']);
    Route::post('/admin/vehicleType/downloadToCSV', [VehicleTypeController::class, 'exportToCSV'])->name('vehicleType.export');
    //User Approval
    Route::resource('/admin/userApproval', ApprovalController::class)->except(['show']);
    Route::post('/admin/userApproval/cari', [ApprovalController::class, 'cari'])->name('cariApprovalType');
    Route::get('/admin/userApproval/print', [ApprovalController::class, 'print']);
    Route::get('/admin/userApproval/downloadToCSV', [ApprovalController::class, 'exportToCSV'])->name('approval.export');
    //Product
    Route::resource('/admin/product', ProductController::class)->except(['show']);
    Route::post('/admin/product/cari', [ProductController::class, 'cari'])->name('cariProductType');
    Route::get('/admin/product/print', [ProductController::class, 'print']);
    Route::get('/admin/product/downloadToCSV', [ProductController::class, 'exportToCSV'])->name('product.export');
    Route::get('/admin/product/import', [ProductController::class, 'impor'])->name('importProduct');
    Route::post('/admin/product/import', [ProductController::class, 'imporData'])->name('imporDataP');
    //Salesman
    Route::resource('/admin/salesman', SalesmanController::class)->except(['show']);
    Route::post('/admin/salesman/cari', [SalesmanController::class, 'cari'])->name('cariSalesmanType');
    Route::get('/admin/salesman/print', [SalesmanController::class, 'print'])->name('printSalesman');
    Route::get('/admin/salesman/downloadToCSV', [SalesmanController::class, 'exportToCSV'])->name('salesman.export');
    //Customer
    Route::resource('/admin/customer', CustomerController::class)->except(['show']);
    Route::post('/admin/customer/cari', [CustomerController::class, 'cari'])->name('cariCustomerType');
    Route::get('/admin/customer/print', [CustomerController::class, 'print']);
    Route::get('/admin/customer/downloadToCSV', [CustomerController::class, 'exportToCSV'])->name('customer.export');
    Route::get('/admin/customer/downloadToExcel', [CustomerController::class, 'exportToExcel'])->name('customer.excel');
    //Supplier
    Route::resource('/admin/supplier', SupplierController::class)->except(['show']);
    Route::post('/admin/supplier/cari', [SupplierController::class, 'cari'])->name('cariSupplierType');
    Route::get('/admin/supplier/print', [SupplierController::class, 'print']);
    Route::get('/admin/supplier/downloadToCSV', [SupplierController::class, 'exportToCSV'])->name('supplier.export');
    Route::get('/admin/supplier/downloadToExcel', [SupplierController::class, 'exportToExcel'])->name('supplier.excel');
    //Warehouse
    Route::resource('/admin/warehouse', WarehouseController::class)->except('show')->except('destroy');
    Route::post('/admin/warehouse/cari', [WarehouseController::class, 'cari'])->name('cariWarehouseType');
    Route::get('/admin/warehouse/print', [WarehouseController::class, 'print']);
    Route::post('/admin/warehouse/downloadToCSV', [WarehouseController::class, 'exportToCSV'])->name('warehouse.export');
    //Forwarder
    Route::resource('/admin/forwarder', ForwarderController::class)->except(['show']);
    Route::post('/admin/forwarder/cari', [CustomerController::class, 'cari'])->name('cariForwarderType');
    Route::get('/admin/forwarder/print', [CustomerController::class, 'print']);
    Route::post('/admin/forwarder/downloadToCSV', [CustomerController::class, 'exportToCSV'])->name('forwarder.export');
    //Backup
    Route::get('/admin/backup', [BackupController::class, 'index']);
    Route::get('/admin/backup/download', [BackupController::class, 'downloadDatabase'])->name('backup');
    //Navbar
    Route::get('/admin/navbar/add', [NavbarController::class, 'getButtonOptions'])->name('navbarAdd');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
