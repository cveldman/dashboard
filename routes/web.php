<?php

Route::namespace('Veldman\Dashboard\Http\Controllers\Dashboard')
    ->middleware(['web', 'auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    // User Management
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
});
