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

Route::get('/', 'MovieController@index');

Route::get('/reservations/{id}', 'ReservationController@index');
Route::post('/reservation/create', 'ReservationController@create');
Route::post('/reservation/step2', 'ReservationController@addReservation');