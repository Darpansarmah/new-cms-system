<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
 
    Route::get('/replies', 'ReplyController@index')->name('replies.index');
    Route::post('/replies', 'ReplyController@store')->name('replies.store');
    Route::get('/replies/{reply}', 'ReplyController@show')->name('replies.show');
    Route::patch('/replies/{reply}/update', 'ReplyController@update')->name('replies.update');
    Route::delete('/replies/{reply}/delete', 'ReplyController@destroy')->name('replies.destroy');

});

Route::middleware('role:Admin')->group(function() {

});