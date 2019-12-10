<?php
// Route::get('/', function () { return redirect('/admin/home'); });
Route::get('/', 'WeatherController@index');
Route::resource('weather', 'WeatherController');
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::get('/cities-by-state/{id}', function ($id) {
    return Cities::get_cities($id);
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    

    
    
    Route::resource('processes', 'Admin\ProcessesController');
    Route::put('processes/update2/{id}', ['uses' => 'Admin\ProcessesController@update2', 'as' => 'processes.update2']);
    Route::put('processes/update3/{id}', ['uses' => 'Admin\ProcessesController@update3', 'as' => 'processes.update3']);
    Route::put('processes/update4/{id}', ['uses' => 'Admin\ProcessesController@update4', 'as' => 'processes.update4']);
    Route::put('processes/update5/{id}', ['uses' => 'Admin\ProcessesController@update5', 'as' => 'processes.update5']);
    Route::get('requester', ['uses' => 'Admin\ProcessesController@requester', 'as' => 'processes.requester']);
    Route::get('approver', ['uses' => 'Admin\ProcessesController@approver', 'as' => 'processes.approver']);
    Route::get('processes/view', ['uses' => 'Admin\ProcessesController@view', 'as' => 'processes.view']);
    Route::get('processes/next/{id}', ['uses' => 'Admin\ProcessesController@next', 'as' => 'processes.next']);
    Route::post('processes_mass_destroy', ['uses' => 'Admin\ProcessesController@massDestroy', 'as' => 'processes.mass_destroy']);
    
});
