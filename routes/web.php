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

    Route::get('order',
        [
            'as'   => 'order.home',
            'uses' => 'PageController@home'
        ]);
    Route::get('reviews',
        [
            'as'   => 'order.review',
            'uses' => 'PageController@review'
        ]);
    Route::get('/menus', 'PageController@menus')
         ->name('menus')
         ->middleware('auth');

});

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


Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
Route::get('notifications', [
    'as'   => 'pages.notifications',
    'uses' => 'PageController@notifications'
]);
Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
Route::get('tables',
    ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
Route::get('typography',
    ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
Route::get('upgrade',
    ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);

