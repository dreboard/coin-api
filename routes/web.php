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

Route::get('/', function () {
    return response()->json([
        'coin' => 1,
        'state' => 'CA',
    ]);
});

Route::group(['prefix' => 'coins', 'as' => 'coins.'], function () {
    Route::post('/view', 'App\Http\Controllers\CoinController@index')->name('view');
    Route::get('/year', 'App\Http\Controllers\CoinController@coinsByYear')->name('year');
    Route::get('/form', 'CoinController@add')->name('form');
    Route::get('/add/{id}', 'CoinController@add')->name('add');

    Route::post('/variety_by_id/{id}', 'App\Http\Controllers\CoinVarietyController@viewByID')->name('variety_by_id');
    Route::post('/variety/{id}', 'App\Http\Controllers\CoinVarietyController@index')->name('variety');
    Route::get('/varietyType/{variety}/{id}', 'App\Http\Controllers\CoinVarietyController@byType')->name('varietyType');

});
