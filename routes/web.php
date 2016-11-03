<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ClearSettleController@home')->name('home');
Route::get('/transaction_report', 'ClearSettleController@transactionReport')->name('transaction_report');
Route::match(['get', 'post'], '/transaction_report', 'ClearSettleController@transactionReport')->name('transaction_report');
