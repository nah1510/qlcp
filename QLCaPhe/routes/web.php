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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index','CaPheController@getIndex');
Route::get('login','CaPheController@login');

Route::post('login-form', 'DangNhapController@postLogin');


Route::get('test','CaPheController@test');
Route::get('/dashboard', function () {
    return view('admin.index');
});
Route::get('/sanpham', function () {
    return redirect('sanpham/list');
});
Route::group(['prefix'=>'sanpham'],function(){
    Route::get('list','SanPhamController@getList');
    Route::get('edit','SanPhamController@Edit');
    Route::get('add','SanPhamController@Add');
});