<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HomePageController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
});

// Protected routes
Route::middleware('admin.auth')->group(function () {
    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Services
    Route::resource('services', ServiceController::class);

    // Events
    Route::resource('events', EventController::class);

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    // Home Page Content Management
    Route::get('home', [HomePageController::class, 'edit'])->name('home.edit');
    Route::put('home', [HomePageController::class, 'update'])->name('home.update');
    Route::delete('home/hero/slides/{index}', [HomePageController::class, 'deleteHeroSlide'])->name('home.hero.delete-slide');
});
