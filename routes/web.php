<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'SpondonIt\LmsService\Controllers', 'middleware' => 'web'], function () {
    Route::group(['prefix' => 'install'], function(){
        Route::get('/', 'InstallController@index')->name('service.install');
        Route::get('user', 'InstallController@user')->name('service.user');
        Route::post('user', 'InstallController@post_user');
    });

});


