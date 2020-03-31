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
    return view('pages.home');
});
Route::post('/login', 'web\LoginController@login')->name('login');
Route::get('/login', 'web\LoginController@create')->name('loginForm');
Route::get('/logout', 'web\LoginController@logout')->name('logout');


// PROTECTED ADMIN ROUTES

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin', 'web\FrontEndController@admin');
    Route::get('/admin/users-list', 'web\FrontEndController@userList');
    Route::resource('/admin/users', 'web\UserController');
    Route::resource('/admin/books', 'web\BookController');
    Route::resource('/admin/editions', 'web\EditionsController');

});
