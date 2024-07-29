<?php

use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\SeoController;
use App\Http\Controllers\API\CalculatorController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/search', [SearchController::class, 'search']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/calculators', [CalculatorController::class, 'index']);
Route::get('/calculators/recent', [CalculatorController::class, 'recent']);
Route::get('/seo', [SeoController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);
