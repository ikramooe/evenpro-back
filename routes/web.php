<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('language/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('language');

Route::get('/events/{event:slug}', [App\Http\Controllers\EventController::class, 'index'])->name('event');
// Event routes
Route::get('/events/{event:slug}', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/forms/{type}', [App\Http\Controllers\EventController::class, 'showForm'])->name('events.forms.show');
Route::post('/events/{event}/forms/{form}/register', [App\Http\Controllers\EventRegistrationController::class, 'store'])->name('events.forms.register');
Route::get('/events/{event:slug}/{type}', [App\Http\Controllers\EventController::class, 'page'])
    ->where('type', 'welcome|media|registration|exhibitors')
    ->name('events.page');

// Admin event routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);
    Route::resource('events.pages', App\Http\Controllers\Admin\EventPageController::class);
    Route::resource('events.forms', App\Http\Controllers\Admin\EventFormController::class)->except(['show']);
    Route::get('registrations', [App\Http\Controllers\Admin\EventFormController::class, 'index']);
    
    Route::get('events/{event}/forms/{form}/registrations', [App\Http\Controllers\Admin\EventFormController::class, 'showRegistrations'])->name('events.forms.registrations');
    Route::patch('events/{event}/forms/{form}/registrations/{registration}/status', [App\Http\Controllers\Admin\EventFormController::class, 'updateRegistrationStatus'])->name('events.forms.registrations.update-status');
    Route::delete('events/{event}/forms/{form}/registrations/{registration}', [App\Http\Controllers\Admin\EventFormController::class, 'destroyRegistration'])->name('events.forms.registrations.destroy');
    Route::get('events/{event}/pages/{type}/edit', [App\Http\Controllers\Admin\EventPageController::class, 'edit'])
        ->where('type', 'welcome|media|registration|exhibitors')
        ->name('events.pages.edit');
    Route::put('events/{event}/pages/{type}', [App\Http\Controllers\Admin\EventPageController::class, 'update'])
        ->where('type', 'welcome|media|registration|exhibitors')
        ->name('events.pages.update');
});

Route::middleware(['auth'])->group(function () {
    // Home page sections
    Route::get('/admin/home-sections', [\App\Http\Controllers\Admin\HomePageController::class, 'edit'])->name('admin.home-sections.edit');
    Route::put('/admin/home-sections', [\App\Http\Controllers\Admin\HomePageController::class, 'update'])->name('admin.home-sections.update');
    
    // About page sections
    Route::get('/admin/about-sections', [\App\Http\Controllers\Admin\AboutPageController::class, 'edit'])->name('admin.about-sections.edit');
    Route::put('/admin/about-sections', [\App\Http\Controllers\Admin\AboutPageController::class, 'update'])->name('admin.about-sections.update');

    // settings
    Route::get('/admin/settings', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/admin/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');
});
