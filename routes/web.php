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

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, X-Requested-With, accept, Content-Type, x-xsrf-token, x_csrftoken' );
header( 'Access-Control-Allow-Methods: GET, POST' );

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Post/Create', 'PostController@Create')->name('post.create');
Route::post('/Post/Store', 'PostController@Store')->name('post.store');

Route::get('/employee', function () {
    return view('employees/index');
});
Route::get('/api/v1/employees/{id?}', 'EmployeesController@index');
Route::post('/api/v1/employees', 'EmployeesController@store');
Route::post('/api/v1/employees/{id?}', 'EmployeesController@update');
Route::delete('/api/v1/employees/{id?}', 'EmployeesController@destroy');

