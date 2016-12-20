<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Support\Facades\Input;
use App\Booking;
use App\Service_hour;
//use DB;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
// Route::get('/', 'HomeController@index');

Route::get('/images/grid', 'ImagesController@grid');
Route::resource('/images', 'ImagesController');

Route::get('/bookings/grid', 'BookingsController@grid');
Route::resource('/bookings', 'BookingsController');

//Route::resource('/bookings/pdf', 'BookingsController@pdf');
Route::resource('/bookings/diterima', 'BookingsController@diterima');
Route::resource('/bookings/ditolak', 'BookingsController@ditolak');
Route::resource('/bookings/batal', 'BookingsController@batal');
Route::resource('/bookings/done', 'BookingsController@done');
Route::get('/layanans/grid', 'LayanansController@grid');
Route::resource('/layanans', 'LayanansController');
Route::resource('/layanans/edit', 'LayanansController@edit');

// Route::get('/bookings/diterima/{$id}', function ($id) {
//     return view('layouts.dashboard');
// });
Route::get('/service_hours/grid', 'Service_hoursController@grid');
Route::resource('/service_hours', 'Service_hoursController');

Route::resource('/bookings/pdf','BookingsController@getPdf');

Route::get('/teslas/grid', 'TeslasController@grid');
Route::resource('/teslas', 'TeslasController');