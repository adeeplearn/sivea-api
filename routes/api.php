<?php

use Illuminate\Http\Request;

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


/*
|--------------------------------------------------------------------------
| Dosen Api Routes
|--------------------------------------------------------------------------
*/

// List dosens
Route::get('dosens', 'DosenController@index');

// List single dosen
Route::get('dosen/{id}', 'DosenController@show');

// Create new dosen
Route::post('dosen', 'DosenController@store');

// Update dosen
Route::put('dosen', 'DosenController@store');

// Delete dosen
Route::delete('dosen/{id}', 'DosenController@destroy');
