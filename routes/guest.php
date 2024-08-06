<?php

use App\Http\Controllers\Guest\FaqController;
use App\Http\Controllers\Guest\MailController;
use App\Http\Controllers\Guest\CalculatorController;
use App\Http\Controllers\Guest\FavoriteController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Guest\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->name('pages.')->group(function() {
    Route::get('/', 'index')->name('index');
});

Route::controller(FavoriteController::class)->middleware('auth')->name('favorites.')->prefix('favorites')->group(function() {
    Route::post('/{id}', 'store')->name('store');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

Route::controller(ProfileController::class)->middleware('auth')->name('profile.')->prefix('profile')->group(function () {
    Route::get('/', 'edit')->name('edit');
    Route::patch('/', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
});

Route::controller(FaqController::class)->name('faq.')->prefix('faq')->group(function() {
    Route::get('/', 'index')->name('index');
});

Route::controller(CalculatorController::class)->name('calculators.')->group(function() {
    Route::get('/{slug}', 'show')->name('show');
    Route::delete('/calculators/{id}', 'destroy')->name('destroy');
    Route::post('/calculators', 'store')->name('store');
    Route::post('/calculators/{uuid}', 'processing')->name('processing');
});

Route::controller(MailController::class)->name('mails.')->prefix('mails')->group(function() {
    Route::post('/send', 'sendMessage')->name('send');
});





