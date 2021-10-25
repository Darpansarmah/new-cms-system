<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
 
    Route::get('/comments', 'CommentController@index')->name('comments.index');
    Route::post('/comments', 'CommentController@store')->name('comments.store');
    Route::get('/comments/{comment}', 'CommentController@show')->name('comments.show');
    Route::patch('/comments/{comment}', 'CommentController@update')->name('comments.update');
    Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

});

Route::middleware('role:Admin')->group(function() {
    
});
