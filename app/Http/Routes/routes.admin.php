<?php
/*
|--------------------------------------------------------------------------
| Application Routes - Admin 
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {

   

    Route::get('/login', ['as' => 'login', function() {
        return view('admin.login.login');
    }]);

    Route::post('/postlogin', [ 'as' => 'postlogin', 'uses' => 'LoginController@postLogin']);
    
    Route::get('/logout', [ 'as' => 'logout', function() {
        Auth::logout();
        return Redirect::to('/admin/login');
    }]);

    // // Forgot Password 

    Route::get('/forgotpassword', ['as' => 'forgotpassword', function() {
        return view('forgotpassword.forgot');
    }]);

    Route::post('/postforgot', [ 'as' => 'postforgotpassword', 'middleware' => 'exist','uses' => 'PasswordController@postForgotPassword']);

    Route::get('/resetpassword/{code}/{email}', [ 'as' => 'resetpassword', 'middleware' => 'exist','uses' => 'PasswordController@resetPassword']);

    Route::post('/postreset', [ 'as' => 'postresetpassword', 'uses' => 'PasswordController@postResetPassword']);

    // // Admin Profile

    Route::get('/dashboard', ['as' => 'dashboard', 'middleware' => 'auth', function() {
        return view('dashboard.dashboard');
    }]);

    Route::get('/profile/view', ['as' => 'viewprofile','middleware' => 'auth','uses' => 'ProfileController@view']);

    Route::get('/profile/edit', ['as' => 'editprofile','uses' => 'ProfileController@editProfile']); 

    Route::post('/profile/save',['as' => 'updateprofile', 'uses' => 'ProfileController@updateProfile']);

    Route::get('/changepassword', ['as' => 'changepassword', 'middleware' => 'auth', function() {
        return view('profile.changepassword');
    }]);

    Route::post('/postchangepassword',['as' => 'postchangepassword', 'uses' => 'ProfileController@changePassword']);
    

    
    

});

