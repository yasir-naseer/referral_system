<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'referrals'], function() {
    Route::get('/', 'ReferralController@index')->name('referrals.index');
    Route::post('/store', 'ReferralController@store')->name('referrals.store');
});

Route::group(['prefix' => 'subscriptions'], function() {
    Route::get('/', 'SubscriptionController@index')->name('subscriptions.index');
    Route::post('/store', 'SubscriptionController@store')->name('subscriptions.store');
});
