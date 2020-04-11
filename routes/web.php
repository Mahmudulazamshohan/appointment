<?php

// Route::get('/', function(){
//     return view('admin.emails.just-got-reservation');
// });

Route::resource('/','LandingController');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('specialists-available-times-ajax', 'HomeController@specialistAvailableTimesAjax')->name('specialists-available-times-ajax');
    Route::post('specialists-available-times-ajax', 'HomeController@saveSpecialistAvailableTimesAjax');
    Route::put('specialists-available-times-ajax', 'HomeController@updateSpecialistAvailableTimesAjax');
    Route::post('marked-as-occupied', 'HomeController@markedAsOccupied')->name('marked-as-occupied');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Customers
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/media', 'CustomerController@storeMedia')->name('customers.storeMedia');
    Route::post('customers/ckmedia', 'CustomerController@storeCKEditorImages')->name('customers.storeCKEditorImages');
    Route::resource('customers', 'CustomerController');

    // Appointments
    Route::delete('appointments/destroy', 'AppointmentController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'AppointmentController');
    Route::get('book-appointment', 'AppointmentController@bookAppointment')->name('book-appointment');
    Route::post('change-appointment-status', 'AppointmentController@changeAppointmentStatus')->name('change-appointment-status');

    // Frontend Settings
    Route::delete('frontend-settings/destroy', 'FrontendSettingController@massDestroy')->name('frontend-settings.massDestroy');
    Route::post('frontend-settings/media', 'FrontendSettingController@storeMedia')->name('frontend-settings.storeMedia');
    Route::post('frontend-settings/ckmedia', 'FrontendSettingController@storeCKEditorImages')->name('frontend-settings.storeCKEditorImages');
    Route::resource('frontend-settings', 'FrontendSettingController');
    // Route::get('frontend-settings','FrontendSettingController@edit');

    // Specialists
    Route::delete('specialists/destroy', 'SpecialistController@massDestroy')->name('specialists.massDestroy');
    Route::post('specialists/media', 'SpecialistController@storeMedia')->name('specialists.storeMedia');
    Route::post('specialists/ckmedia', 'SpecialistController@storeCKEditorImages')->name('specialists.storeCKEditorImages');
    Route::resource('specialists', 'SpecialistController');
    Route::get('specialists-available-times', 'SpecialistController@specialistsAvailableTimes')->name('specialists-available-times');
    Route::get('specialists-available-times/{specialistid}', 'SpecialistController@getSpecialistAvailableTimes');
    Route::post('available-times', 'SpecialistController@saveAvailableTimes')->name('available-times');


    // References
    Route::delete('references/destroy', 'ReferenceController@massDestroy')->name('references.massDestroy');
    Route::post('references/media', 'ReferenceController@storeMedia')->name('references.storeMedia');
    Route::post('references/ckmedia', 'ReferenceController@storeCKEditorImages')->name('references.storeCKEditorImages');
    Route::resource('references', 'ReferenceController');
    
    // Reservations
    Route::delete('reservations/destroy', 'ReservationController@massDestroy')->name('reservations.massDestroy');
    Route::resource('reservations', 'ReservationController');

    // Services
    Route::delete('services/destroy', 'ServiceController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServiceController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServiceController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServiceController');


    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

    Route::resource('app-default-settings', 'AppDefaultSettingsController');
    Route::get('get-app-default-settings', 'AppDefaultSettingsController@getAppDefaultSettings')->name('get-app-default-settings');
    Route::resource('add-times', 'TimeSettingsController');
});
Route::get('get-specialist', 'LandingController@getSpecialist')->name('get-specialist');
Route::get('get-specialist-available-days', 'LandingController@getSpecialistAvailableDays')->name('get-specialist-available-days');
Route::get('get-specialist-available-times', 'LandingController@getSpecialistAvailableTimes')->name('get-specialist-available-times');
Route::get('appointment-form', 'LandingController@appointmentForm')->name('appointment-form');
Route::post('appointment-form', 'LandingController@submitAppointmentForm');