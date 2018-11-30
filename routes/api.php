<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/', 'SinglePageController@index');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('users/all', 'AuthController@allusers');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});



/*
//admin
  //Route::group([
  //'prefix' =>'admin'
//], function(){

Route::post('register', 'AdminController@register');
    Route::post('login', 'AdminController@authenticate');
    Route::get('open', 'DataController@open');

    Route::group([
      'middleware' => ['jwt.verify']
    ], function() {
        Route::get('user', 'AdminController@getAuthenticatedUser');
        Route::get('closed', 'DataController@closed');
    });

//  });

*/
Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');
    Route::get('open', 'DataController@open');

      Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'UserController@getAuthenticatedUser');
        Route::get('closed', 'DataController@closed');
    });

//services API
Route::get('services', 'ServiceController@index');
Route::get('service/{id}', 'ServiceController@show');
Route::post('service', 'ServiceController@store');
Route::put('service', 'ServiceController@store');
Route::delete('service/{id}', 'ServiceController@destroy');


//automobile API
Route::get('automobiles', 'AutomobileController@index');
Route::get('automobile/{id}', 'AutomobileController@show');
Route::post('automobile', 'AutomobileController@store');
Route::put('automobile', 'AutomobileController@store');
Route::delete('automobile/{id}', 'AutomobileController@destroy');
//});

//vehicle API
Route::get('vehicles', 'VehicleController@index');
Route::get('vehicle/{id}', 'VehicleController@show');
Route::post('vehicle', 'VehicleController@store');
Route::put('vehicle', 'VehicleController@store');
Route::delete('vehicle/{id}', 'VehicleController@destroy');

//Bookings API
Route::get('bookings', 'BookingController@index');
Route::get('booking/{id}', 'BookingController@show');
Route::post('booking', 'BookingController@store');
Route::put('booking', 'BookingController@store');
Route::delete('booking/{id}', 'BookingController@destroy');

//Services Rendered API
Route::get('services/render', 'ServiceRenderController@index');
Route::get('service/render/{id}', 'ServiceRenderController@show');
Route::post('service/render', 'ServiceRenderController@store');
Route::put('service/render', 'ServiceRenderController@store');
Route::delete('service/render/{id}', 'ServiceRenderController@destroy');

//Services Category API
Route::get('services/category', 'ServiceCategoryController@index');
Route::get('service/category/{id}', 'ServiceCategoryController@show');
Route::post('service/category', 'ServiceCategoryController@store');
Route::put('service/category', 'ServiceCategoryController@store');
Route::delete('service/category/{id}', 'ServiceCategoryController@destroy');

//Engine Category API
Route::get('engines/category', 'EngineController@index');
Route::get('engine/category/{id}', 'EngineController@show');
Route::post('engine/category', 'EngineController@store');
Route::put('engine/category', 'EngineController@store');
Route::delete('engine/category/{id}', 'EngineController@destroy');

//Role Category API
Route::get('roles', 'RoleController@index');
Route::get('role/{id}', 'RoleController@show');
Route::post('role', 'RoleController@store');
Route::put('role', 'RoleController@store');
Route::delete('role/{id}', 'RoleController@destroy');


//Vendor API
Route::get('vendors', 'VendorController@index');
Route::get('vendor/{id}', 'VendorController@show');
Route::post('vendor', 'VendorController@store');
Route::put('vendor', 'VendorController@store');
Route::delete('vendor/{id}', 'VendorController@destroy');
