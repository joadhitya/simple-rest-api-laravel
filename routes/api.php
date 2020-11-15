<?php

use Illuminate\Http\Request;

Route::get('/products', 'ProductController@get');
Route::get('/product/{id}', 'ProductController@getById');
Route::post('/product', 'ProductController@post');
Route::put('/product/{id}','ProductController@put');
Route::delete('/product/{id}', 'ProductController@delete');
