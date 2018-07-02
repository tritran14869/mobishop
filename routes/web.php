<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('index', function() {
	return redirect('home');
});

Route::get('/', function() {
	return redirect('home');
});

Route::get('home', [
	'as'=>'home-page',
	'uses'=>'PagesController@getIndex'
]);


Route::get('{name}', [
	'as'=>'productByName-page',
	'uses'=>'PagesController@getProductsByName'
]);


Route::get('dt/price', [
	'as'=>'productByPrice-page',
	'uses'=>'PagesController@getProductsByPrice'
]);


Route::get('dt/feature', [
	'as'=>'productByFeature-page',
	'uses'=>'PagesController@getProductsByFeature'
]);


Route::get('dt/detail', [
	'as'=>'productDetail-page',
	'uses'=>'PagesController@getProductsDetail'
]);


Route::get('add-to-cart/{id}', [
	'as'=>'addToCart',
	'uses'=>'PagesController@getAddToCart'
]);


Route::get('del-cart/{id}', [
	'as'=>'delCart',
	'uses'=>'PagesController@getDelCart'
]);


Route::get('minus/{id}', [
	'as'=>'decreaseQty',
	'uses'=>'PagesController@getDecreaseQty'
]);

Route::get('plus/{id}', [
	'as'=>'increaseQty',
	'uses'=>'PagesController@getIncreaseQty'
]);

Route::get('u/dat-hang' , [
	'as'=>'dathang-page',
	'uses'=>'PagesController@getDatHang'
]);



Route::get('u/thanh-toan', [
	'as'=>'thanhtoan',
	'uses'=>'PagesController@getThanhToan'
]);

Route::get('u/dang-nhap', [
	'as'=>'login-page',
	'uses'=>'PagesController@getLogin'
]);

Route::post('u/dang-nhap', [
	'as'=>'login-page',
	'uses'=>'PagesController@postLogin'
]);

Route::get('u/dang-ky', [
	'as'=>'register-page',
	'uses'=>'PagesController@getReg'
]);
Route::post('u/dang-ky', [
	'as'=>'register-page',
	'uses'=>'PagesController@postReg'
]);

Route::get('u/dang-xuat', [
	'as'=>'logout',
	'uses'=>'PagesController@getLogout'
]);

Route::get('u/trang-ca-nhan', [
	'as'=>'profile-page',
	'uses'=>'PagesController@getProfile'
]);

Route::get('u/admin', [
	'as'=>'admin-page',
	'uses'=>'PagesController@getAdmin'
]);

Route::get('u/admin-logout', [
	'as'=>'admin-logout',
	'uses'=>'PagesController@getAdminLogout'
]);

Route::post('tim-kiem', [
	'as' => 'result',
	'uses' => 'PagesController@postSearch'
]);

Route::get('u/tim-kiem-nc', [
	'as' => 'adv',
	'uses' => 'PagesController@getAdvancedSearch'
]);

Route::post('ket-qua', [
	'as' => 'advResult',
	'uses' => 'PagesController@postAdvancedSearch'
]);

Route::get('AdminDelete/{id}/{tab?}', [
	'as' => 'AdminDelete',
	'uses' => 'PagesController@getAdminDelete'
]);

Route::get('u/AdminEditProduct/{email}/{id}/{productName}/{typeName}/{unitPrice}/{image}', [
	'as'=>'AdminEditProduct',
	'uses'=>'PagesController@getAdminEditProduct'
]);



Route::post('EditProduct', [
			'as' => 'EditProduct',
			'uses' => 'PagesController@postEditProduct'
]);

Route::get('u/GetEditProducer/{email}/{id}/{name}', [
	'as' => 'GetEditProducer',
	'uses' => 'PagesController@getEditProducer'
]);

Route::post('EditProducer', [
			'as' => 'EditProducer',
			'uses' => 'PagesController@postEditProducer'
]);

Route::get('u/AdminAdd/{email}/{tab?}', [
	'as' => 'AdminAdd',
	'uses' => 'PagesController@getAdminAdd'
]);

Route::post('AddIndex/{tab?}', [
			'as' => 'AddIndex',
			'uses' => 'PagesController@postAddIndex'
]);

Route::get('Deliver/{id}', [
			'as' => 'Deliver',
			'uses' => 'PagesController@getDeliver'
]);

Route::get('EditUser1/{email}/{id}/{Uemail}/{name}/{birthday?}/{hometown?}', [
			'as' => 'EditUser1',
			'uses' => 'PagesController@getEditUser'
]);

Route::post('EditUser', [
			'as' => 'EditUser',
			'uses' => 'PagesController@postEditUser'
]);














































?>

