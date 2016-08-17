<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

// Password Reset Routes...
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);


Route::get('/home', 'HomeController@index');


Route::group(['prefix'=>'api/v1'],function(){
   Route::get('todos',function(){
       return App\Todo::all();
   });

    //Route::get('todos',function(){
    //    $todos= App\Todo::all();
    //    return Response::json(array('todos' => $todos),200);
    //});


    Route::post('todos',function(){
        return App\Todo::all();
    });
});



//TEST AVEC PROTECTION DE LA ROUTE
//Route::group(['middleware'=>'auth'],function(){
//    Route::group(['prefix'=>'api/v1'],function(){
//        Route::get('todos',function(){
//            return App\Todo::all();
//        });
//
//        //Route::get('todos',function(){
//        //    $todos= App\Todo::all();
//        //    return Response::json(array('todos' => $todos),200);
//        //});
//    });
//});










