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

//Route::get('/', 'PagesController@home')->name('home');
//Route::get('/home', 'PagesController@home')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/users/load', 'UsersController@load')->name('users.load');

    Route::get('/registrations/load', 'RegistrationsController@load')->name('registrations.load');

    Route::post('/events/create', 'EventsController@create')->name('events.create');
    Route::get('/events/{id}', 'EventsController@edit')->name('events.edit')->where('id', '\d+');
    Route::post('/events/{id}', 'EventsController@update')->name('events.update')->where('id', '\d+');

});

Route::get('/events/load', 'EventsController@load')->name('events.load');
Route::post('/events/register', 'RegistrationsController@register')->name('events.register');

Route::get('{catchall}', 'PagesController@home')->name('home')->where('catchall', '(.*)');
