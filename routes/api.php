<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Client\AuthController as ClientAuthController;
use App\Http\Controllers\Api\Driver\AuthController as DriverAuthController;
use App\Http\Controllers\Api\Client\AddressController as ClientAddressController;
use App\Http\Controllers\Api\Client\ShipmentController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\Driver\ShipmentController as DriverShipmentController;

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

Route::group(['prefix' => 'v1', 'middleware' => ['ApiHeaderVerify']], function () {

    Route::get('/settings', [SettingsController::class, 'settings']);

});

//API routes Client
Route::group(['prefix' => 'v1/client', 'middleware' => ['ApiHeaderVerify']], function () {
    Route::post('/register', [ClientAuthController::class, 'register']);
    Route::post('/login', [ClientAuthController::class, 'login']);
    Route::post('/social-login', [ClientAuthController::class, 'social_login']);
    Route::post('/forgot-password', [ClientAuthController::class, 'forgotPassword']);

    //Protecting Routes
    Route::group(['middleware' => ['auth:api']], function () {

        Route::post('/profile-update', [ClientAuthController::class, 'profileUpdate']);
        Route::post('/store-device-token', [ClientAuthController::class, 'store_token']);
        Route::post('/store-address', [ClientAddressController::class, 'store_address']);
        Route::get('/get-vehicles', [ShipmentController::class, 'get_active_vehicles']);
        Route::post('/get-delivery-charges', [ShipmentController::class, 'get_delivery_charges']);
        Route::post('/create-shipment', [ShipmentController::class, 'place_new_shipment']);
        Route::get('/get-addresses', [ClientAddressController::class, 'get_addresses']);
        Route::get('/get-shipments', [ShipmentController::class, 'get_shipments']);
        Route::post('/get-shipment-by-id', [ShipmentController::class, 'get_shipment']);
        Route::get('/get-notifications', [ClientAuthController::class, 'get_notifications']);
        Route::post('/logout', [ClientAuthController::class, 'logout']);

    });
});


//API routes Driver
Route::group(['prefix' => 'v1/driver', 'middleware' => ['ApiHeaderVerify']], function () {
    Route::post('/register', [DriverAuthController::class, 'register']);
    Route::post('/login', [DriverAuthController::class, 'login']);

    //Protecting Routes
    Route::group(['middleware' => ['auth:drivers']], function () {

        Route::post('/profile-update', [DriverAuthController::class, 'profileUpdate']);
        Route::post('/store-device-token', [DriverAuthController::class, 'store_token']);
        Route::post('/change-status', [DriverAuthController::class, 'online_offline_status']);
        Route::post('/save-location', [DriverAuthController::class, 'save_driver_locations']);
        Route::get('/get-broadcasted-shipments', [DriverShipmentController::class, 'getBroadcastedOrders']);
        Route::post('/get-assigned-shipments', [DriverShipmentController::class, 'getAssignedShipments']);
        Route::post('/driver-shipment-status', [DriverShipmentController::class, 'changeOrderStatus']);
        Route::post('/pickup-or-complete', [DriverShipmentController::class, 'changeStatus']);
        Route::post('/logout', [DriverAuthController::class, 'logout']);

    });
});
