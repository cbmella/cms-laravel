<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('{id}', [BlogController::class, 'show'])->name('show');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'dashboard'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
        Route::resource('templates', TemplateController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('posts', PostController::class);
        Route::resource('pages', PageController::class);
        Route::group(['prefix' => 'profile'], function () {
            Route::get('change', [ProfileController::class, 'index'])->name('index');
            Route::post('change', [ProfileController::class, 'changePassword'])->name('changePassword');
            Route::get('update', [ProfileController::class, 'updateProfileShow'])->name('updateProfileShow');
            Route::post('update', [ProfileController::class, 'updateProfile'])->name('updateProfile');
        });
    });
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('google', [LoginController::class, 'redirectToGoogle']);
    Route::get('google/callback', [LoginController::class, 'handleGoogleCallback']);
    Route::get('facebook', [LoginController::class, 'redirectToFacebook']);
    Route::get('facebook/callback', [LoginController::class, 'handleFacebookCallback']);
});
