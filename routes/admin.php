<?php

use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\CalculatorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/', DashboardController::class)->name('index');

    Route::controller(UploadController::class)->prefix('upload')->name('upload.')->group(function () {
        Route::post('/image', 'uploadImage');
        Route::post('/file', 'uploadFile');
    });

    Route::controller(SettingsController::class)->name('settings.')->prefix('settings')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::patch('/', 'update')->name('update');
    });

    Route::controller(MenuController::class)->name('menus.')->prefix('menus')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('/rebuild', 'rebuild')->name('rebuild');
    });

    Route::controller(CategoryController::class)->name('categories.')->prefix('categories')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(UserController::class)->name('users.')->prefix('users')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(CalculatorController::class)->name('calculators.')->prefix('calculators')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(SeoController::class)->name('seo.')->prefix('seo')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(FaqController::class)->name('faq.')->prefix('faq')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});
