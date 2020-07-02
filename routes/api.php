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

Route::middleware(['auth:api'])->group(function () {
	Route::get('/contact', 'ContactController@index');
	Route::post('/contact', 'ContactController@store');
	Route::patch('/contact/{contactId}', 'ContactController@update');
	Route::delete('/contact/{contactId}', 'ContactController@destroy');
});
