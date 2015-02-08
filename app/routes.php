<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'ChecklistsController@index');

Route::get('/login', 'LoginController@showLogin');
Route::post('/login', 'LoginController@login');
Route::get('/logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));

Route::controller('password', 'RemindersController');
Route::resource('users', 'UsersController');
Route::resource('clients', 'ClientsController');
Route::resource('checklists', 'ChecklistsController');
Route::resource('clsections', 'ClSectionsController');