<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'=>'\App\Http\Livewire\Auth\Admin',
    'as'=>'admin.'
], function () {
    Route::group([
        'middleware' => ['guest:admin'],
        'prefix'=>'admin',
    ], function () {
        Route::get('login', AdminLogin::class)->name('login');
    });

    Route::group([
        'middleware' => ['auth:admin'],
    ], function () {
//        Route::get('admin_logout', AdminLogin::class)->name('logout');
        Route::post('admin-logout', [AuthenticatedSessionController::class, 'admin_destroy'])
            ->name('logout');
    });
});




//Route::middleware(['guest:admin'])->group(function () {
//    Route::get('admin/login', \App\Http\Livewire\Auth\Admin\AdminLogin::class) ->name('admin.login');
//});

Route::middleware(['guest:web'])->group(function () {
//    Route::get('register', [RegisteredUserController::class, 'create'])
//        ->name('register');

//    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('register', \App\Http\Livewire\Auth\Register::class) ->name('register');


    Route::get('login', \App\Http\Livewire\Auth\Login::class) ->name('login');

//    Route::get('login', [AuthenticatedSessionController::class, 'create'])
//                ->name('login');

//    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::group([

], function () {
    Route::group([
        'middleware' => ['auth'],
        'namespace'=>'\App\Http\Livewire\Auth',

    ], function () {
        Route::get('verify-email', VerifyEmail::class)->name('verification.notice');
    });
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});



Route::middleware('auth')->group(function () {
//    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
//                ->name('verification.notice');
//

//
//    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//                ->name('password.confirm');
//
//    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
//
//    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//                ->name('logout');
});
