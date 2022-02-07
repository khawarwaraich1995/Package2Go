<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\VehiclesController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Api\Client\AuthController as ClientAuthController;

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

Route::get('/', function(){
    return view('front.pages.home');
});
Route::get('/about-us', function(){
    return view('front.pages.about');
});
Route::get('/contact-us', function(){
    return view('front.pages.contact-us');
});
Route::get('/pricing', function(){
    return view('front.pages.pricing');
});
Route::get('/services', function(){
    return view('front.pages.services');
});

//Admin Auth Routes
Route::group(['prefix' => 'admin', 'middleware' => ['guest'], 'as' => 'admin:'], function () {

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'login_attempt'])->name('login.action');
});

//Language Controller Routes
Route::get('lang/{locale}', [LocalizationController::class, 'index']);

//Forgot Password Routes
Route::get('/forgot-password/{token}', [ClientAuthController::class, 'showResetPasswordForm']);
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password.update');


//Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin:'], function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    //Dashboard Routes
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Users Routes
    Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('permission:view-users');
    Route::get('/user-create', [UserController::class, 'create'])->name('user.create')->middleware('permission:modify-users');
    Route::post('users/add', [UserController::class, 'store'])->name('user.add')->middleware('permission:modify-users');;
    Route::any('users/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('permission:modify-users');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:modify-users');
    Route::post('users/change_status', [UserController::class, 'change_status'])->name('user.status')->middleware('permission:change-status');
    Route::get('/user-destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:delete-users');

    //Customers Routes
    Route::get('/customers', [CustomersController::class, 'customers'])->name('customers');
    Route::post('customers/change_status', [CustomersController::class, 'change_status'])->name('customer.status');
    Route::get('/customer-destroy/{id}', [CustomersController::class, 'destroy'])->name('customer.destroy');

    //Roles Routes
    Route::get('/roles', [RolesController::class, 'index'])->name('roles');
    Route::get('/role-create', [RolesController::class, 'create'])->name('role.create');
    Route::post('/role-add', [RolesController::class, 'store'])->name('role.add');
    Route::post('/roles/update/{id}', [RolesController::class, 'store'])->name('role.update');
    Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');
    Route::get('roles/permission-modules/{id}', [RolesController::class, 'permission_modules'])->name('role.permission-modules');
    Route::post('roles/permission-modules/update/{id}', [RolesController::class, 'permission_modules_update'])->name('permissions-modules.update');
    Route::get('/role-destroy/{id}', [RolesController::class, 'destroy'])->name('role.destroy');
    Route::post('role/change_status', [RolesController::class, 'change_status'])->name('role.status');

    //Permissions Routes
    Route::get('permission/create', [PermissionsController::class, 'create'])->name('permission.create');
    Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions');
    Route::get('permissions/edit/{id}', [PermissionsController::class, 'edit'])->name('permission.edit');
    Route::post('permissions/add', [PermissionsController::class, 'store'])->name('permissions.add');
    Route::any('permissions/update/{id}', [PermissionsController::class, 'store'])->name('permissions.update');
    Route::any('permissions/delete/{id}', [PermissionsController::class, 'destroy'])->name('permissions.delete');


    //Settings Routes
    Route::get('/settings/business', [SettingsController::class, 'business_index']);
    Route::post('/update/settings/business', [SettingsController::class, 'update_business_settings'])->name('update-business-settings');
    //SMTP Setting Routes
    Route::get('/settings/smtp', [SettingsController::class, 'smtp_index']);
    Route::post('/update/settings/smtp', [SettingsController::class, 'update_smtp_settings'])->name('update-smtp-settings');
    //SMS Settings Routes
    Route::get('/settings/sms', [SettingsController::class, 'sms_index']);
    Route::post('/update/settings/sms', [SettingsController::class, 'update_sms_settings'])->name('update-sms-settings');
    //Notifications Settings Routes
    Route::get('/settings/notifications', [SettingsController::class, 'notifications_index']);
    Route::post('/update/settings/notifications', [SettingsController::class, 'update_notifications_settings'])->name('update-notifications-settings');
    //Courier Settings Routes
    Route::get('/settings/courier', [SettingsController::class, 'courier_index']);
    Route::post('/update/settings/courier', [SettingsController::class, 'update_courier_settings'])->name('update-courier-settings');

    //Shipments Routes
    Route::get('/shipments', [ShipmentController::class, 'index'])->name('shipments');
    Route::get('/get/shipments', [ShipmentController::class, 'getShipments'])->name('get.shipments');
    Route::get('/shipment/detail/{tracking_no}', [ShipmentController::class, 'shipmentDetail'])->name('shipment.detail');
    Route::post('/shipment/change-status', [ShipmentController::class, 'change_status'])->name('shipment.status');


    //Vehicles Routes
    Route::get('/vehicles', [VehiclesController::class, 'vehicles'])->name('vehicles');
    Route::get('vehicle/create', [VehiclesController::class, 'create'])->name('vehicle.create');
    Route::post('vehicle/add', [VehiclesController::class, 'store'])->name('vehicle.add');
    Route::get('vehicle/edit/{id}', [VehiclesController::class, 'edit'])->name('vehicle.edit');
    Route::get('vehicle/timing/{id}', [VehiclesController::class, 'timing'])->name('timing');
    Route::any('vehicle/timing-update/{id}', [VehiclesController::class, 'timing_update'])->name('vehicle.timing.update');
    Route::any('vehicle/update/{id}', [VehiclesController::class, 'store'])->name('vehicle.update');
    Route::post('vehicle/change_status', [VehiclesController::class, 'change_status'])->name('vehicle.status');
    Route::get('/vehicle-destroy/{id}', [VehiclesController::class, 'destroy'])->name('vehicle.destroy');

    //Drivers Routes
    Route::get('/drivers', [UserController::class, 'index'])->name('drivers')->middleware('permission:view-drivers');
});
