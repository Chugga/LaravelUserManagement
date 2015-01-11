<?php

class LoginController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Login Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'LoginController@showStoreLogin');
    |
    */

    public function showLogin()
    {
        return View::make('login');
    }

    public function login(){
        if (Auth::attempt(array('username' => Input::get('username'), 'password' =>  Input::get('password')))){
            //Redirect
            return Redirect::intended('/');
        }else{
            //Die
            return Redirect::to('/login')->with('message_error', 'Could not authenticate with the provided username and password');
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/login');
    }

}