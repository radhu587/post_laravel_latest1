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
Route::get('/',function(){
    return view('blog.home');
});
Auth::routes();
Route::get('/home/create','HomeController@create');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/show', 'HomeController@show');
Route::post('/home/build/{user}','HomeController@build');
Route::get('/home/showMyPost/{user}','HomeController@myPost');
Route::get('/home/edit/{blog}','HomeController@edit');
Route::get('/home/delete/{blog}','HomeController@delete');
Route::post('/home/saveChange/{blog}','HomeController@saveChange'); 
Route::post('/home/addComment/{blog}','HomeController@addComment');