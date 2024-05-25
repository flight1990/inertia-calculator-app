<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/', DashboardController::class)->name('index');
});
