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

Route::get('/', 'HomeController@index');

//Route Location
Route::get('/location', 'LocationController@index');
Route::post('/location/store', 'LocationController@store');
Route::patch('/location/update/{id}', 'LocationController@update');
Route::delete('/location/delete/{id}', 'LocationController@destroy');

//Route Employee
Route::get('/employee', 'EmployeeController@index');
Route::post('/employee/store', 'EmployeeController@store');
Route::patch('/employee/update/{id}', 'EmployeeController@update');
Route::delete('/employee/delete/{id}', 'EmployeeController@destroy');
Route::post('/employee/search', 'EmployeeController@search');
