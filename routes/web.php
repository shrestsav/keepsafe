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

Route::get('/v/{any}', 'HomeController@index')->where('any', '.*');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['role:superAdmin']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::get('/listStaffs','UserController@listStaffs')->name('staffs.list');
Route::post('/createStaff','UserController@create_staff')->name('staffs.create');

Route::resource('attendance','AttendanceController');

Route::resource('clients','ClientController');
Route::post('clientContacts','ClientController@clientContacts');

Route::resource('jobs','JobController');
Route::get('listJobs/{key}','JobController@jobs');
Route::get('deletedJobs','JobController@deletedJobs');
Route::post('restoreJob','JobController@restoreJob');
Route::get('listEvents/{job_id}','JobController@jobEvents');
Route::get('listAllEvents/{key}','JobController@allEvents');
Route::post('storeEvent','JobController@jobEventStore');
Route::post('updateEvent','JobController@jobEventUpdate');
Route::get('detailEvent/{event_id}','JobController@jobEventDetails');

//Config variables
Route::get('jobTypes','CoreController@jobTypes');
Route::get('jobStatuses','CoreController@jobStatuses');
Route::get('jobStatusesMenu','CoreController@jobStatusesMenu');
Route::get('states','CoreController@states');
Route::get('eventStatuses','CoreController@event_statuses');
Route::get('eventTypes','CoreController@event_types');
Route::get('eventVehicles','CoreController@event_vehicles');
Route::get('installTypes','CoreController@install_types');
Route::get('roofTypes','CoreController@roof_types');
Route::get('pitches','CoreController@pitches');
Route::get('heights','CoreController@heights');

//Config Fields
Route::get('jobEventFields','CoreController@job_event_fields');