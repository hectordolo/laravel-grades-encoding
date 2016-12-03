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

Route::get('/', function () {
    if(Auth::user()){
        return view('home');
    }else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'subject'], function () {
    Route::get('/section/{section}/subject/{subject}', ['as' => 'subject.index','uses' => 'SubjectController@index']);
    Route::get('/encode/section/{section}/subject/{subject}', ['as' => 'subject.encode','uses' => 'SubjectController@encode']);
});
