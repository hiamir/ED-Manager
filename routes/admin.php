<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group([

], function () {
    Route::group([
        'middleware' => ['auth:admin', 'role:super admin|admin'],
        'namespace'=>'\App\Http\Livewire\Admin',
        'prefix'=>'admin',
        'as'=>'admin.'

    ], function () {
        Route::get('dashboard', AdminDashboard::class)->name('dashboard');
        Route::get('administrators', \App\Http\Livewire\Admin\Administrators\Controller::class)->name('admins');
        Route::get('users', \App\Http\Livewire\Admin\Users\Controller::class)->name('users');
        Route::get('profile', \App\Http\Livewire\Admin\Profile\Controller::class)->name('profile');
        Route::get('roles', \App\Http\Livewire\Admin\Role\Controller::class)->name('roles');
        Route::get('permissions', \App\Http\Livewire\Admin\Permissions\Controller::class)->name('permissions');
    });
});

require __DIR__ . '/auth.php';
