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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('employee/set', 'EmployeeController@setEmployee');
Route::post('employee/get', 'EmployeeController@getEmployee');
Route::post('employee/unset', 'EmployeeController@unsetEmployee');

Route::post('employee/history/set', 'EmployeeHistoryController@setEmployeeHistory');
Route::post('employee/history/get', 'EmployeeHistoryController@getEmployeeHistory');
Route::post('employee/history/unset', 'EmployeeHistoryController@unsetEmployeeHistory');
