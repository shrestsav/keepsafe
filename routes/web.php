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

Route::get('/', 'HomeController@index')->name('dashboard');


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['role:superAdmin']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::get('/staffs','UserController@staffs')->name('staffs.index');
Route::get('/listStaffs','UserController@listStaffs')->name('staffs.list');
Route::post('/createStaff','UserController@create_staff')->name('staffs.create');

Route::resource('attendance','AttendanceController');

Route::resource('clients','ClientController');
Route::post('clientContacts','ClientController@clientContacts');

Route::resource('jobs','JobController');
Route::get('listJobs','JobController@jobs');

//Config variables
Route::get('jobTypes','CoreController@jobTypes');
Route::get('jobStatuses','CoreController@jobStatuses');
Route::get('states','CoreController@states');

