<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/author', 'UserController@author');
Route::get('/setup', 'UserController@setup');
Route::POST('/setin', 'UserController@setin');
Route::get('/xesog', 'UserController@xesog'); 

