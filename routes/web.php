<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UnauthorizedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DeploymentController;
use App\Http\Middleware\Role;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/unauthorized-access', [UnauthorizedController::class, 'index'])
    ->name('unauthorized');

Route::middleware(['auth', Role::class])->group(function() {
    Route::prefix('admin')->name('admin.')->group(function () {

        // dashboard
        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');
        Route::post('/equipment/count', [HomeController::class, 'getEquipmentCount'])
            ->name('equipment.count');
        Route::post('/counts/borrowed', [HomeController::class, 'getBorrowedCount'])
            ->name('counts.borrowed');
        Route::post('/counts/returned', [HomeController::class, 'getReturnedCount'])
            ->name('counts.returned');
        Route::post('/counts/users', [HomeController::class, 'getUserCount'])
            ->name('counts.users');
            
        // CMS
        Route::resource('/department', DepartmentController::class);
        Route::resource('/unit', UnitController::class);
        Route::resource('/equipment', EquipmentController::class);
        Route::resource('/inventory', InventoryController::class);
        Route::resource('/deployment', DeploymentController::class);

        // Deployment
        Route::PUT('/deployment/return/{deployment}', [DeploymentController::class, 'deploymentReturn'])
            ->name('deployment.depReturn');
    });
});
