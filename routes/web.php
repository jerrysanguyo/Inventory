<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UnauthorizedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\AccountController;
use App\Http\Middleware\Role;
use App\Http\Middleware\UserRole;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/unauthorized-access', [UnauthorizedController::class, 'index'])
    ->name('unauthorized');
    
Route::get('/inventory/export', [App\Http\Controllers\InventoryController::class, 'exportExcel'])
    ->name('inventory.export');

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

        // profile
        Route::get('/account/profile', [AccountController::class, 'profile'])
            ->name('account.profile');
        Route::PUT('/account/profile/edit', [AccountController::class, 'profileEdit'])
            ->name('account.profile.edit');
            
        // CMS
        Route::resource('/department', DepartmentController::class);
        Route::resource('/unit', UnitController::class);
        Route::resource('/equipment', EquipmentController::class);
        Route::resource('/inventory', InventoryController::class);
        Route::resource('/deployment', DeploymentController::class);
        Route::resource('/account', AccountController::class);

        Route::PUT('/account/{account}/roleUser', [AccountController::class, 'makeUser'])
            ->name('account.makeUser');
        Route::PUT('/account/{account}/roleAdmin', [AccountController::class, 'makeAdmin'])
            ->name('account.makeAdmin');

        // Deployment
        Route::PUT('/deployment/return/{deployment}', [DeploymentController::class, 'deploymentReturn'])
            ->name('deployment.depReturn');

        // export
        // Route::get('/inventory/export', [App\Http\Controllers\InventoryController::class, 'exportExcel'])
        //     ->name('inventory.export');
    });
});

Route::middleware(['auth', UserRole::class])->group(function() {
    Route::prefix('user')->name('user.')->group(function () {
        //dashboard
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
            
        Route::resource('/inventory', InventoryController::class);

        // profile
        Route::get('/account/profile', [AccountController::class, 'profile'])
            ->name('account.profile');
        Route::PUT('/account/profile/edit', [AccountController::class, 'profileEdit'])
            ->name('account.profile.edit');

    });
});
