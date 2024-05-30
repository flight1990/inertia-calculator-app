<?php

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
});
