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

Route::middleware(['AuthKey'])->group(function () {
    Route::get('/work', function () {
        return response()->json(['message' => 'AUTHENTICATED']);
    });

    Route::post('/login', 'LoginController@postLogin');
    Route::resource('user' , 'BookController');
});
