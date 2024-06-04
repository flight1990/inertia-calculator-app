<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\CalculatorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/', DashboardController::class)->name('index');

    Route::controller(CategoryController::class)->name('categories.')->prefix('categories')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(UserController::class)->name('users.')->prefix('users')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(CalculatorController::class)->name('calculators.')->prefix('calculators')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(SeoController::class)->name('seo.')->prefix('seo')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(FaqController::class)->name('faq.')->prefix('faq')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});
