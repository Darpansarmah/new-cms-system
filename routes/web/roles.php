<?php

use Illuminate\Support\Facades\Route;

Route::get('/roles', 'RoleController@index')->name('roles.index');

Route::post('/roles', 'RoleController@store')->name('roles.store');

Route::delete('/roles/{role}/delete', 'RoleController@destroy')->name('roles.destroy');

Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit');

Route::put('/roles/{role}/update', 'RoleController@update')->name('roles.update');

Route::put('/roles/{role}/permissions/attach', 'RoleController@attach')->name('roles.permissions.attach');

Route::delete('/roles/{role}/permissions/detach', 'RoleController@detach')->name('roles.permissions.detach');