<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ForwarderController;
use App\Http\Controllers\InventoryByCategoryController;
use App\Http\Controllers\ProductCategoryListController;
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
use App\Http\Controllers\InventoryAdjustmentController;
use App\Http\Controllers\InventoryByDateController;
use App\Http\Controllers\InventoryByProductController;
use App\Http\Controllers\InventoryReturnController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductSubCategoryListController;

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
    Route::get('/admin/productCategory/pilihCopy', [ProductCategoryController::class, 'kopiData']);
    Route::get('/admin/productCategory/copy/{id}', [ProductCategoryController::class, 'copy']);
    Route::post('/admin/productCategory/copy/proses/', [ProductCategoryController::class, 'prosesData'])->name('productCategory.prosesData');
    Route::get('admin/productCategory/downloadFormat', [ProductCategoryController::class, 'getFileDownload'])->name('downloadFormatProdukCategory');
    //Product Category List
    Route::resource('/admin/productCategoryList', ProductCategoryListController::class)->except(['show', 'edit', 'update', 'destroy']);
    Route::post('/admin/productCategoryList/cari', [ProductCategoryListController::class, 'cari']);
    //Product Sub Category List
    Route::resource('/admin/subCategoryList', ProductSubCategoryListController::class)->except(['show', 'edit', 'update', 'destroy']);
    Route::post('/admin/subCategoryList/cari', [ProductSubCategoryListController::class, 'cari']);
     //Product Brand List
     Route::resource('/admin/brand', BrandController::class)->except(['show']);
     Route::post('/admin/brand/cari', [BrandController::class, 'cari']);
    //Vehicle Type
    Route::resource('/admin/vehicleType', VehicleTypeController::class)->except(['show']);
    Route::post('/admin/vehicleType/cari', [VehicleTypeController::class, 'cari'])->name('cariVehicleType');
    Route::get('/admin/vehicleType/print', [VehicleTypeController::class, 'print']);
    Route::post('/admin/vehicleType/downloadToCSV', [VehicleTypeController::class, 'exportToCSV'])->name('vehicleType.export');
    Route::get('/admin/vehicleType/pilihCopy', [VehicleTypeController::class, 'kopiData']);
    Route::get('/admin/vehicleType/copy/{id}', [VehicleTypeController::class, 'copy']);
    Route::post('/admin/vehicleType/copy/proses/', [VehicleTypeController::class, 'prosesData'])->name('vehicleType.prosesData');
    //User Approval
    Route::resource('/admin/userApproval', ApprovalController::class)->except(['show']);
    Route::post('/admin/userApproval/cari', [ApprovalController::class, 'cari'])->name('cariApprovalType');
    Route::get('/admin/userApproval/print', [ApprovalController::class, 'print']);
    Route::get('/admin/userApproval/downloadToCSV', [ApprovalController::class, 'exportToCSV'])->name('approval.export');
    Route::get('/admin/userApproval/pilihCopy', [ApprovalController::class, 'kopiData']);
    Route::get('/admin/userApproval/copy/{id}', [ApprovalController::class, 'copy']);
    Route::post('/admin/userApproval/copy/proses/', [ApprovalController::class, 'prosesData'])->name('approval.prosesData');
    //Product
    Route::resource('/admin/product', ProductController::class)->except(['show']);
    Route::post('/admin/product/cari', [ProductController::class, 'cari'])->name('cariProductType');
    Route::get('/admin/product/print', [ProductController::class, 'print']);
    Route::get('/admin/product/downloadToCSV', [ProductController::class, 'exportToCSV'])->name('product.export');
    Route::get('/admin/product/import', [ProductController::class, 'impor'])->name('importProduct');
    Route::post('/admin/product/import', [ProductController::class, 'imporData'])->name('imporDataP');
    Route::get('/admin/product/pilihCopy', [ProductController::class, 'kopiData']);
    Route::get('/admin/product/copy/{id}', [ProductController::class, 'copy']);
    Route::post('/admin/product/copy/proses/', [ProductController::class, 'prosesData'])->name('product.prosesData');
    Route::get('admin/product/downloadFormat', [ProductController::class, 'getFileDownload'])->name('downloadFormatProduk');
    //Salesman
    Route::resource('/admin/salesman', SalesmanController::class)->except(['show']);
    Route::post('/admin/salesman/cari', [SalesmanController::class, 'cari'])->name('cariSalesmanType');
    Route::get('/admin/salesman/print', [SalesmanController::class, 'print'])->name('printSalesman');
    Route::get('/admin/salesman/downloadToCSV', [SalesmanController::class, 'exportToCSV'])->name('salesman.export');
    Route::get('/admin/salesman/pilihCopy', [SalesmanController::class, 'kopiData']);
    Route::get('/admin/salesman/copy/{id}', [SalesmanController::class, 'copy']);
    Route::post('/admin/salesman/copy/proses/', [SalesmanController::class, 'prosesData'])->name('salesman.prosesData');
    //Customer
    Route::resource('/admin/customer', CustomerController::class)->except(['show']);
    Route::post('/admin/customer/cari', [CustomerController::class, 'cari'])->name('cariCustomerType');
    Route::get('/admin/customer/print', [CustomerController::class, 'print']);
    Route::get('/admin/customer/downloadToCSV', [CustomerController::class, 'exportToCSV'])->name('customer.export');
    Route::get('/admin/customer/downloadToExcel', [CustomerController::class, 'exportToExcel'])->name('customer.excel');
    Route::get('/admin/customer/pilihCopy', [CustomerController::class, 'copy']);
    Route::get('/admin/customer/copy/{id}', [CustomerController::class, 'kopiData']);
    Route::post('/admin/customer/copy/proses/', [CustomerController::class, 'prosesData'])->name('customer.prosesData');
    //Supplier
    Route::resource('/admin/supplier', SupplierController::class)->except(['show']);
    Route::post('/admin/supplier/cari', [SupplierController::class, 'cari'])->name('cariSupplierType');
    Route::get('/admin/supplier/print', [SupplierController::class, 'print']);
    Route::get('/admin/supplier/downloadToCSV', [SupplierController::class, 'exportToCSV'])->name('supplier.export');
    Route::get('/admin/supplier/downloadToExcel', [SupplierController::class, 'exportToExcel'])->name('supplier.excel');
    Route::get('/admin/supplier/pilihCopy', [SupplierController::class, 'copy']);
    Route::get('/admin/supplier/copy/{id}', [SupplierController::class, 'kopiData']);
    Route::post('/admin/supplier/copy/proses/', [SupplierController::class, 'prosesData'])->name('supplier.prosesData');
    //Warehouse
    Route::resource('/admin/warehouse', WarehouseController::class)->except(['show', 'destroy']);
    Route::post('/admin/warehouse/cari', [WarehouseController::class, 'cari'])->name('cariWarehouseType');
    Route::get('/admin/warehouse/print', [WarehouseController::class, 'print']);
    Route::post('/admin/warehouse/downloadToCSV', [WarehouseController::class, 'exportToCSV'])->name('warehouse.export');
    Route::get('/admin/warehouse/pilihCopy', [WarehouseController::class, 'kopiData']);
    Route::get('/admin/warehouse/copy/{id}', [WarehouseController::class, 'copy']);
    Route::post('/admin/warehouse/copy/proses/', [WarehouseController::class, 'prosesData'])->name('warehouse.prosesData');
    //Forwarder
    Route::resource('/admin/forwarder', ForwarderController::class)->except(['show']);
    Route::post('/admin/forwarder/cari', [ForwarderController::class, 'cari'])->name('cariForwarderType');
    Route::get('/admin/forwarder/print', [ForwarderController::class, 'print']);
    Route::post('/admin/forwarder/downloadToCSV', [ForwarderController::class, 'exportToCSV'])->name('forwarder.export');
    Route::get('/admin/Forwarder/pilihCopy', [ForwarderController::class, 'kopiData']);
    Route::get('/admin/Forwarder/copy/{id}', [ForwarderController::class, 'copy']);
    Route::post('/admin/Forwarder/copy/proses/', [ForwarderController::class, 'prosesData'])->name('forwarder.prosesData');
    //Backup
    Route::get('/admin/backup', [BackupController::class, 'index']);
    Route::get('/admin/backup/download', [BackupController::class, 'downloadDatabase'])->name('backup');
    //Navbar
    Route::get('/admin/navbar/add', [NavbarController::class, 'getButtonOptions'])->name('navbarAdd');
    //Inventory
    Route::get('admin/inventory/perProduct', [InventoryController::class, 'getProductInventory']);
    Route::post('admin/inventory/perProduct/cari', [InventoryController::class, 'cari'])->name('cariProductInventory');
    //Inventory Adjustments
    Route::get('admin/inventory/adjustments', [InventoryAdjustmentController::class, 'index']);
    Route::get('admin/inventory/adjustments/in/create', [InventoryAdjustmentController::class, 'createIn'])->name('adjustmentIn.create');
    Route::get('admin/inventory/adjustments/out/create', [InventoryAdjustmentController::class, 'createOut'])->name('adjustmentOut.create');
    Route::post('admin/inventory/adjustments/in/store', [InventoryAdjustmentController::class, 'store'])->name('adjustmentsIn.store');
    Route::post('admin/inventory/adjustments/out/store', [InventoryAdjustmentController::class, 'store'])->name('adjustmentsOut.store');
    Route::post('admin/inventory/adjustment/cari', [InventoryAdjustmentController::class, 'cari'])->name('cariAdjustment');
    //Inventory Return
    Route::get('admin/inventory/return', [InventoryReturnController::class, 'index']);
    Route::get('admin/inventory/return/in/create', [InventoryReturnController::class, 'createIn'])->name('returnIn.create');
    Route::get('admin/inventory/return/out/create', [InventoryReturnController::class, 'createOut'])->name('returnOut.create');
    Route::post('admin/inventory/return/in/store', [InventoryReturnController::class, 'store'])->name('returnIn.store');
    Route::post('admin/inventory/return/out/store', [InventoryReturnController::class, 'store'])->name('returnOut.store');
    Route::post('admin/inventory/return/cari', [InventoryReturnController::class, 'cari'])->name('cariReturn');
    //Inventory By Category
    Route::get('admin/inventory/byCategory', [InventoryByCategoryController::class, 'index']);
    Route::post('admin/inventory/byCategory/cari', [InventoryByCategoryController::class, 'cari'])->name('hasilRekapInventoryCategory');
    //Inventory By Date
    Route::get('admin/inventory/byDate', [InventoryByDateController::class, 'index']);
    Route::post('admin/inventory/byDate/cari', [InventoryByDateController::class, 'cari'])->name('hasilRekapInventoryDate');
    //Inventory By Product
    Route::get('admin/inventory/byProduct', [InventoryByProductController::class, 'index']);
    Route::post('admin/inventory/byProduct/cari', [InventoryByProductController::class, 'cari'])->name('hasilRekapInventoryProduct');
    });

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
