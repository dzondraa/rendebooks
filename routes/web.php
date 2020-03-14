<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

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
    return view('welcome');
});

Route::resource('/login', 'LoginController');


// PROTECTED ADMIN ROUTES

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return dd("asd");
    });

});
