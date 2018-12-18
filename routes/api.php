<?php

use Illuminate\Http\Request;

/*
API Routes
*/

Route::get('auth','AuthController@getAuthToken');
Route::get('setAccess','AuthController@setAuth');
Route::get('error','AuthController@error');

// By Middleware Custom Authentication
Route::group(['middleware' => 'myauth'], function () 
{      
	Route::get('getproducts','ProductsController@getAllproduct');
	Route::get('search','ProductsController@searchProduct');
	Route::delete('del/{product_id}','ProductsController@deleteProduct');
	Route::put('update_product','ProductsController@editProduct');
	Route::post('insert_product','ProductsController@insertProduct');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
