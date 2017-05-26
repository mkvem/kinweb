<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth.api_simple']], function () {
	Route::post('/user/create_user', 'UserController@create_user')->name('api.user.create_user');	
	Route::get('/gudang/getGudang/{status}/{imei}', 'GudangUserController@getGudang')->name('api.gudang.getGudang');	

	//Barang
	// GET ALL BARANG IN GUDANG MASUK
	Route::get('/barang/getShipmentList/{id}/{imei}', 'ShipmentListController@getAllinGudang')->name('api.shipmentlist.getAllinGudang');	
	// UPDATE STATUS BARANG
	Route::get('/barang/approve/masuk/{barcode}/{imei}', 'ShipmentListController@done')->name('api.shipmentlist.approve');	
	// GET DETAIL BARANG MASUK
	Route::get('/barang/detail/masuk/{id}/{barcode}/{imei}', 'ShipmentListController@getDetail')->name('api.shipmentlist.detail');	
	// SEARCH BARANG MASUK
	Route::get('/barang/search/masuk/{id}/{imei}/{keyword?}', 'ShipmentListController@search')->name('api.shipmentlist.search');	
});