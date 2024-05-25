<?php

use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Guest\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->name('pages.')->group(function() {
    Route::get('/', 'index')->name('index');
});

Route::controller(ProfileController::class)->middleware('auth')->name('profile.')->prefix('profile')->group(function () {
    Route::get('/', 'edit')->name('edit');
    Route::patch('/', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
});
