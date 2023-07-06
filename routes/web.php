<?php

use App\Http\Controllers\Apps\DashboardController;
use App\Http\Controllers\Apps\PermissionController;
use App\Http\Controllers\Apps\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return \Inertia\Inertia::render('Auth/Login');
})->middleware('guest');


Route::prefix('apps')->group(function () {
    //middleware "auth"
    Route::group(['middleware' => ['auth']], function () {
        //route dashboard
        Route::get('dashboard', DashboardController::class)->name('apps.dashboard');
        //route permission
        Route::get('/permissions', PermissionController::class)->name('apps.permissions.index')->middleware('permission:permissions.index');
        //route role
        Route::resource('/roles', \App\Http\Controllers\Apps\RoleController::class, ['as' => 'apps'])->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');

        //route user
        Route::resource('/users', \App\Http\Controllers\Apps\UserController::class, ['as' => 'apps'])->middleware('permission:users.index|users.create|users.edit|users.delete');

        //route category
        Route::resource('/categories', \App\Http\Controllers\Apps\CategoryController::class, ['as' => 'apps'])->middleware('permission:categories.index|categories.create|categories.edit|categories.delete');
    });
});
