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
    return view('dashboard');
});
Route::get('/sanpham', function () {
    return redirect('sanpham/list');
});
Route::group(['prefix'=>'sanpham'],function(){
    Route::get('list','SanPhamController@getList');
    Route::get('edit','SanPhamController@Edit');
    Route::post('edit','SanPhamController@postEdit');
    Route::get('add','SanPhamController@Add');
    Route::post('add','SanPhamController@postAdd');
    Route::get('delete/{id}','SanPhamController@Delete');
});
Route::get('/nhanvien', function () {
    return redirect('nhanvien/list');
});
Route::group(['prefix'=>'nhanvien'],function(){
    Route::get('list','NhanVienController@getList');
    Route::get('edit','NhanVienController@Edit');
    Route::post('edit','NhanVienController@postEdit');
    Route::get('add','NhanVienController@Add');
    Route::post('add','NhanVienController@postAdd');
    Route::get('delete/{id}','NhanVienController@Delete');
});
Route::get('/loaisanpham', function () {
    return redirect('loaisanpham/list');
});
Route::group(['prefix'=>'loaisanpham'],function(){
    Route::get('list','LoaiSanPhamController@getList');
    Route::get('edit','LoaiSanPhamController@Edit');
    Route::post('edit','LoaiSanPhamController@postEdit');
    Route::get('add','LoaiSanPhamController@Add');
    Route::post('add','LoaiSanPhamController@postAdd');
    Route::get('delete/{id}','LoaiSanPhamController@Delete');
});
Route::get('/khachhang', function () {
    return redirect('khachhang/list');
});
Route::group(['prefix'=>'khachhang'],function(){
    Route::get('list','KhachHangController@getList');
    Route::get('edit','KhachHangController@Edit');
    Route::post('edit','KhachHangController@postEdit');
    Route::get('add','KhachHangController@Add');
    Route::post('add','KhachHangController@postAdd');
    Route::get('delete/{id}','KhachHangController@Delete');
});