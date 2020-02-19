<?php

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
Route::post('/usersRegistration', 'Controller@usersRegistration');
Route::post('/usersLogin', 'Controller@usersLogin');
Route::get('/welcome', 'Controller@home');
Route::get('/productadd', 'Controller@productadd');
Route::post('/viewproduct_data', 'Controller@viewproduct_data');