<?php

use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/update', 'UserController@update')->name('users.profile.update');
Route::delete('/users/{user}/delete', 'UserController@destroy')->name('users.destroy');

Route::middleware('role:Admin')->group(function() {
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users', 'UserController@store')->name('users.store');

    Route::put('/users/{user}/attach', 'UserController@attach')->name('users.roles.attach');
    Route::delete('/users/{user}/detach', 'UserController@detach')->name('users.roles.detach');

    Route::delete('/delete/users', 'UserController@deleteUsers')->name('users.delete');
});

Route::middleware(['can:view,user'])->group(function() {
    Route::get('/users/{user}/profile', 'UserController@show')->name('users.profile.show');
});
