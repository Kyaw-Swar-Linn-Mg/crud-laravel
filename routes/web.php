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

Route::get('/',[
   'uses'=>'homeController@getHome',
    'as'=>'home'
]);

Route::get('/register',[
    'uses'=>'authController@getRegister',
    'as'=>'register'
]);

Route::get('/login',[
    'uses'=>'authController@getLogin',
    'as'=>'login'
]);



Route::get('/logout',[
   'uses'=>'authController@getLogout',
    'as'=>'logout'
]);

Route::post('/postReg',[
   'uses'=>'authController@postRegister',
    'as'=>'postReg'
]);

Route::post('postLogin',[
    'uses'=>'authController@postLogin',
    'as'=>'postLogin'
]);



Route::get('/delete/{id}',[
   'uses'=>'adminController@getDelete',
    'as'=>'delete'
]);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard',[
        'uses'=>'authController@getDashboard',
        'as'=>'dashboard'
    ]);
    Route::post('/newStudent',[
        'uses'=>'adminController@postNewStudent',
        'as'=>'newStudent'
    ]);

    Route::post('/edit',[
        'uses'=>'adminController@editStudent',
        'as'=>'editStudent'
    ]);
});
