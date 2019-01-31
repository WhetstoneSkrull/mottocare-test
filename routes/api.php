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
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');

    Route::get('user/{user}/all-user-data','AuthController@allUserData');
    Route::get('user/{user}/bookings','AuthController@showbookings');
    Route::get('user/{user}/service/renders','AuthController@showUserServices');
    Route::get('user/{user}/bookings/services','AuthController@showBookingsServices');
    Route::get('user/{user}/vehicles','AuthController@showVehicles');
    Route::get('user/{user}/drivers','AuthController@showDrivers');
    Route::get('user/{user}/services','AuthController@showVendorServices');
    Route::get('user/{user}/vendor','AuthController@showVendor');
    Route::get('user/{user}/vendor/bookings','AuthController@showVendorBookings');

    Route::get('user/{user}','AuthController@showUser');
    Route::put('user/update','AuthController@updateAccount');
    Route::put('user/upload-photo','AuthController@uploadFile');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
  //  'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
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

Route::get('all/services','ServiceRenderController@showServices');

Route::get('service/render/{service}', 'ServiceRenderController@show');

//Route::get('service/render/{id}', 'ServiceRenderController@show');
Route::post('service/render', 'ServiceRenderController@store');
Route::put('service/render', 'ServiceRenderController@store');
Route::delete('service/render/{id}', 'ServiceRenderController@destroy');


//Cars API
Route::get('cars', 'Carscontroller@index');
Route::get('car/{id}', 'Carscontroller@show');
Route::post('car', 'Carscontroller@store');
Route::put('car', 'Carscontroller@store');
Route::delete('car/{id}', 'Carscontroller@destroy');


//Services Category API
Route::get('all/service/categories', 'ServiceCategoryController@index');
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
Route::get('all/vendors', 'VendorController@showVendors');
Route::get('vendors', 'VendorController@index');
Route::get('vendor/{vendor}', 'VendorController@show');
Route::post('vendor', 'VendorController@store');
Route::put('vendor', 'VendorController@store');
Route::delete('vendor/{id}', 'VendorController@destroy');


//Driver API
Route::get('drivers', 'DriverController@index');
Route::get('driver/{id}', 'DriverController@show');
Route::post('driver', 'DriverController@store');
Route::put('driver', 'DriverController@store');
Route::delete('driver/{id}', 'DriverController@destroy');


//Slot API
Route::get('slots', 'SlotController@index');
Route::get('slot/{id}', 'SlotController@show');
Route::post('slot', 'SlotController@store');
Route::put('slot', 'SlotController@store');
Route::delete('slot/{id}', 'SlotController@destroy');

//Agent API
Route::get('agents', 'AgentController@index');
Route::post('agent', 'AgentController@store');
