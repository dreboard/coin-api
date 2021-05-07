<?php

// Coins
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/view/{id}', [CategoryController::class, 'index'])->name('view');

});
