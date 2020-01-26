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

Route::get('/', 'TicketController@showUsers');
Route::get('/user/{user_id}', 'TicketController@showUser');
Route::post('/newticket/{user_id}', 'TicketController@addTicket');
Route::get('/ticket/{user_id}/{id}', 'TicketController@showTicket');
Route::get('/close/{id}', 'TicketController@closeTicket');
Route::post('/send-message', 'MessageController@sendMessage');
