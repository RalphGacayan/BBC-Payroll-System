<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComputerController;


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/hardware', [App\Http\Controllers\HardwareController::class, 'index']);

Route::get('/add-hardware', [App\Http\Controllers\HardwareController::class, 'create']);

Route::post('/add-hardware', [App\Http\Controllers\HardwareController::class, 'store']);

Route::get('/edit-hardware/{hardware_id}', [App\Http\Controllers\HardwareController::class, 'edit']);

Route::put('/update-hardware/{hardware_id}' , [App\Http\Controllers\HardwareController::class, 'update']);

Route::get('/delete-hardware/{hardware_id}' , [App\Http\Controllers\HardwareController::class, 'destroy']);

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);

Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index']);

Route::get('/add-supplier', [App\Http\Controllers\SupplierController::class, 'create']);

Route::post('/add-supplier', [App\Http\Controllers\SupplierController::class, 'store']);

Route::get('/edit-supplier', [App\Http\Controllers\SupplierController::class, 'edit']);

Route::put('/update-supplier', [App\Http\Controllers\SupplierController::class, 'update']);

Route::get('/destroy-supplier', [App\Http\Controllers\SupplierController::class, 'destroy']);

Route::get('/purchaseorders', [App\Http\Controllers\PurchaseOrdersController::class, 'index']);

Route::get('/add-purchaseorders', [App\Http\Controllers\PurchaseOrdersController::class, 'create']);

Route::post('/add-purchaseorders', [App\Http\Controllers\PurchaseOrdersController::class, 'store']);

Route::get('/edit-purchaseorders/{id}' , [App\Http\Controllers\PurchaseOrdersController::class, 'edit']);

Route::put('/update-purchaseorders/{id}' , [App\Http\Controllers\PurchaseOrdersController::class, 'update']);

Route::get('/delete-purchaseorders/{id}' , [App\Http\Controllers\PurchaseOrdersController::class, 'destroy']);

Route::get('/generate-ASMItemplate/{id}', [App\Http\Controllers\PurchaseOrdersController::class, 'template'])
    ->middleware('auth')
    ->name('purchase.template');


Route::get('/generate-TIBSItemplate/{id}', [App\Http\Controllers\PurchaseOrdersController::class, 'template'])
    ->middleware('auth')
    ->name('purchase.template');

Route::get('/generate-CPNtemplate/{id}', [App\Http\Controllers\PurchaseOrdersController::class, 'template'])
    ->middleware('auth')
    ->name('purchase.template');


Route::get('/generate-PMCCtemplate/{id}', [PurchaseOrdersController::class, 'template'])
    ->middleware('auth')
    ->name('purchase.template');

Route::get('/generate-ACSFItemplate/{id}', [App\Http\Controllers\PurchaseOrdersController::class, 'template'])
    ->middleware('auth')
    ->name('purchase.template');



Route::prefix('admin')->middleware(['auth'])->group(function () {  

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);




});