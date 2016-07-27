<?php
/*
|--------------------------------------------------------------------------
| Application Routes - Site Front End
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('sitetrail',function() {
    return "reached site";
});

/*Route::get('userlogin',function() {
    return "reached site";
});*/
Route::get('/userlogin', 'CreatePostController@create');