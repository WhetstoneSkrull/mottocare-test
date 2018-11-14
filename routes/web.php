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
/*
//pages controller
Route::get('/', 'PagesController@index');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/', function () {
//    return view('layouts.app');
//});

//accounts

Route::group(['middleware' => 'auth'], function (){

	//Route::get('/profile', 'CustomerController@index');
	Route::get('/customer/{slug}', 'CustomerController@index');

	Route::get('/changePhoto', function(){
		return view ('account.picture');

		});

		Route::post('/uploadPhoto', 'AccountsController@uploadPhoto');
		Route::get('/editAccount', 'AccountsController@editAccountForm');
		Route::get('/songs', 'AccountsController@songs');
		Route::get('/me', 'AccountsController@me');
		Route::post('/updateAccount', 'AccountsController@updateAccount');

		Route::get('/changeCover', function(){
		return view ('account.cover');

		});
		Route::post('/uploadCover', 'AccountsController@uploadCover');

});

//admin routes
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/register', 'Auth\AdminLoginController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminLoginController@register')->name('admin.register.submit');

    Route::get('/home', 'AdminController@index')->name('admin.home');
});

//agent routes
Route::prefix('agent')->group(function() {
    Route::get('/login', 'Auth\AgentLoginController@showLoginForm')->name('agent.login');
    Route::post('/login', 'Auth\AgentLoginController@login')->name('agent.login.submit');
    Route::get('/home', 'AgentController@index')->name('agent.home');
});

*/
//Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');


Route::group(['prefix' => 'backend'], function () {
    Voyager::routes();
});
