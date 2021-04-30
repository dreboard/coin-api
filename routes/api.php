<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'coins', 'as' => 'coins.'], function () {
    Route::post('/view', 'App\Http\Controllers\CoinController@index')->name('view');
    Route::get('/year', 'App\Http\Controllers\CoinController@coinsByYear')->name('year');
    Route::get('/form', 'CoinController@add')->name('form');
    Route::get('/add/{id}', 'CoinController@add')->name('add');

    Route::get('/variety_by_id/{id}', 'App\Http\Controllers\CoinVarietyController@viewByID')->name('variety_by_id');
    Route::post('/varietyId', 'App\Http\Controllers\CoinVarietyController@getVarietyByID')->name('varietyId');
    Route::post('/varietyType', 'App\Http\Controllers\CoinVarietyController@getVarietyByName')->name('varietyType');

});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::post('/view', 'App\Http\Controllers\CategoryController@index')->name('view');

});
