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

Route::get('/', 'MainController@index')->middleware('auth');
Route::get('/newKTP', 'MainController@newKTP')->middleware('auth');
Route::get('/editKTP/{id}', 'MainController@editKTP')->middleware('auth');
Route::get('/detailKTP/{id}', 'MainController@detailKTP')->middleware('auth');
Route::post('/c', 'MainController@c')->middleware('auth');
Route::post('/u', 'MainController@u')->middleware('auth');
Route::post('/d', 'MainController@d')->middleware('auth');


Route::get('/user', 'UserController@index')->middleware('auth');
Route::post('/user/logMonitor', 'UserController@getUserLog')->middleware('auth');
Route::post('/user/adminAccess', 'UserController@adminaccess')->middleware('auth');
Route::post('/user/delete', 'UserController@deleteUser')->middleware('auth');

Route::get('/ie/epdf', 'ImportExportController@exportPDF')->middleware('auth');
Route::get('/ie/ecsv', 'ImportExportController@exportCSV')->middleware('auth');
Route::post('/ie/icsv', 'ImportExportController@importCSV')->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
