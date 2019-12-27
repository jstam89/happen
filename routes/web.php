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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
     ->name('home')
     ->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('menus', 'MenuController');

    Route::get('/menus',
        [
            'as'   => 'menus.create',
            'uses' => 'MenuController@create'
        ]);

    Route::get('menu',
        [
            'as'   => 'menu.destroy',
            'uses' => 'MenuController@destroy'
        ]);
});

//User routes
Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController');

    Route::get('profile',
        [
            'as'   => 'profile.edit',
            'uses' => 'ProfileController@edit'
        ]);
    Route::put('profile',
        [
            'as'   => 'profile.update',
            'uses' => 'ProfileController@update'
        ]);
    Route::put('profile/password',
        [
            'as'   => 'profile.password',
            'uses' => 'ProfileController@password'
        ]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('order', 'OrderController');

    Route::get('order',
        [
            'as'   => 'order.home',
            'uses' => 'OrderController@index'
        ]);
    Route::get('orders/overview',
        [
            'as'   => 'order.overview',
            'uses' => 'OrderController@show'
        ]);

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('reservation', 'ReservationController');

    Route::get('reservation',
        [
            'as'   => 'reservation.index',
            'uses' => 'ReservationController@index'
        ]);

    Route::post('reservation/submit',
        [
            'as'   => 'reservation.create',
            'uses' => 'ReservationController@create'
        ]);

});

//Microsoft Graph Auth
Route::post('/oauth',
    [
        'as'   => 'oauth.register',
        'uses' => 'Auth\LoginController@redirectToProvider'
    ]);

Route::get('/oauth/callback',
    [
        'as'   => 'oauth.callback',
        'uses' => 'Auth\LoginController@handleProviderCallback'
    ]);


