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
    return view('welcome');
});


//-------------------Admin -----------------

Route::prefix("admin")->middleware('checkLogin')->group(function(){
    // Category
    Route::resource('categorys', 'CategoryController')->except(['show']);
    //Product
    Route::resource('products', 'ProductController');
    // User
    Route::get('/','UserController@login');
    Route::post('/','UserController@postLogin');
    Route::get('logout','UserController@logout')->name('logout');
    Route::resource('users', 'UserController');

    
});
