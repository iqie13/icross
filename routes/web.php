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

Route::get('/icross', 'IcrossController@index');
Route::get('/api/v1/directions', function() {

    $url = "http://dev.id.extramarks.com/content_data/memorymatch/2019/07/22/2227184/2227184.json";

    $json = json_decode(file_get_contents($url));

    // echo "<pre>" . print_r($json[0]->data, 1) ."</pre>";
    foreach($json[0]->data as $k => $v) {
        $array[] = array(
            'question' => $v->questiondata->question,
            'options' => $v->optiondata->options[0]->optiontext,
            'answer' => $v->rightanswerdata->rightanswer[0]->answer,
        );
    }
    return Response::Json($json[0]);
});