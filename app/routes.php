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





Route::group(array('before' => 'auth'), function() {
    Route::get('/', 'ChecklistsController@index');
    Route::controller('password', 'RemindersController');
    Route::resource('users', 'UsersController');
    Route::resource('clients', 'ClientsController');
    Route::resource('checklists', 'ChecklistsController');
    Route::get('checklists/{id}/pdf', array('uses' => 'ChecklistsController@getPDF', 'as' => 'checklists.pdf'));
    Route::resource('clsections', 'ClSectionsController');
    Route::resource('clsubsections', 'ClSubsectionsController');
    Route::get('/logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));
});

Route::group(array('before' => 'guest'), function() {
    Route::get('/login', 'LoginController@showLogin');
    Route::post('/login', 'LoginController@login');
});