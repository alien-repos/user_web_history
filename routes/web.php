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

Route::get('employee/set/{empId}/{name}/{ipaddress}', 'EmployeeController@setEmployee');
Route::get('employee/get/{empId}', 'EmployeeController@getEmployee');
Route::get('employee/unset/{empId}', 'EmployeeController@unsetEmployee');

Route::get('employee/history/set/{ipaddress}/{url}/{date}', 'EmployeeHistoryController@setEmployeeHistory');
Route::get('employee/history/get/{ipaddress}', 'EmployeeHistoryController@getEmployeeHistory');
Route::get('employee/history/unset/{ipaddress}', 'EmployeeHistoryController@unsetEmployeeHistory');
