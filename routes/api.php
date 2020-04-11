<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Categories
    Route::apiResource('categories', 'CategoryApiController');

    // Customers
    Route::post('customers/media', 'CustomerApiController@storeMedia')->name('customers.storeMedia');
    Route::apiResource('customers', 'CustomerApiController');

    // Appointments
    Route::apiResource('appointments', 'AppointmentApiController');

    // Frontend Settings
    Route::post('frontend-settings/media', 'FrontendSettingApiController@storeMedia')->name('frontend-settings.storeMedia');
    Route::apiResource('frontend-settings', 'FrontendSettingApiController');

    // References
    Route::post('references/media', 'ReferenceApiController@storeMedia')->name('references.storeMedia');
    Route::apiResource('references', 'ReferenceApiController');

    // Specialists
    Route::post('specialists/media', 'SpecialistApiController@storeMedia')->name('specialists.storeMedia');
    Route::apiResource('specialists', 'SpecialistApiController');
});
