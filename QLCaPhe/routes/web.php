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
    return redirect('login');
});

Route::get('login','DangNhapController@login');
Route::post('login-form', 'DangNhapController@postLogin');
Route::post('set-pass', 'DangNhapController@postSetPassWord');
Route::get('logout','DangNhapController@getLogout');
Route::get('lost-pass','DangNhapController@getLostPass');


Route::get('luong-thuong','NhanVienController@LuongThuong')->middleware('AdminLogin');;
Route::group(['prefix'=>'luong-thuong','middleware'=>'AdminLogin'],function(){
    Route::get('deleteDayOff/{id}','NhanVienController@DeleteDayOff');
    Route::get('deleteBonus/{id}','NhanVienController@DeleteBonus');
    Route::post('addBonus','NhanVienController@postAddBonus');
    
});

Route::get('/nguyenlieu', function () {
    return redirect('nguyenlieu/list');
});
Route::group(['prefix'=>'nguyenlieu','middleware'=>'AdminLogin'],function(){
    Route::get('list','NguyenLieuController@getList');
    Route::get('edit','NguyenLieuController@Edit');
    Route::post('edit','NguyenLieuController@postEdit');
    Route::get('add','NguyenLieuController@Add');
    Route::post('add','NguyenLieuController@postAdd');
    Route::post('kiemke','NguyenLieuController@postKiemKe');
    Route::get('delete/{id}','NguyenLieuController@Delete');
    Route::post('ajax_thong_ke_nl','NguyenLieuController@postThongKe');
    Route::post('ajax_NK_Nguyen_Lieu','NguyenLieuController@postNK_Nguyen_Lieu');
});
Route::get('/sanpham', function () {
    return redirect('sanpham/list');
});
Route::group(['prefix'=>'sanpham','middleware'=>'AdminLogin'],function(){
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
Route::group(['prefix'=>'nhanvien','middleware'=>'AdminLogin'],function(){
    Route::get('list','NhanVienController@getList');
    Route::get('edit','NhanVienController@Edit');
    Route::post('edit','NhanVienController@postEdit');
    Route::post('dayoff','NhanVienController@postDayOff');
    Route::get('add','NhanVienController@Add');
    Route::post('add','NhanVienController@postAdd');
    Route::get('delete/{id}','NhanVienController@Delete');
    Route::post('password','NhanVienController@ChangePass');
    Route::post('EditImage','NhanVienController@EditImage');
});
Route::group(['prefix'=>'nhanvien','middleware'=>'CaPheLogin'],function(){
    Route::get('profile','NhanVienController@profile')->middleware('NhanVienLogin');
});
Route::get('/loaisanpham', function () {
    return redirect('loaisanpham/list');
});
Route::group(['prefix'=>'loaisanpham','middleware'=>'AdminLogin'],function(){
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
Route::group(['prefix'=>'khachhang','middleware'=>'CaPheLogin'],function(){
    Route::get('list','KhachHangController@getList')->middleware('AdminLogin');
    Route::get('edit','KhachHangController@Edit')->middleware('AdminLogin');
    Route::post('edit','KhachHangController@postEdit')->middleware('AdminLogin');
    Route::get('add','KhachHangController@Add')->middleware('AdminLogin');
    Route::post('add','KhachHangController@postAdd');
    Route::get('delete/{id}','KhachHangController@Delete')->middleware('AdminLogin');
});
Route::get('/giamgia', function () {
    return redirect('giamgia/list');
});
Route::group(['prefix'=>'giamgia','middleware'=>'AdminLogin'],function(){
    Route::get('list','GiamGiaController@getList');
    Route::get('edit','GiamGiaController@Edit');
    Route::post('edit','GiamGiaController@postEdit');
    Route::get('add','GiamGiaController@Add');
    Route::post('add','GiamGiaController@postAdd');
    Route::get('delete/{id}','GiamGiaController@Delete');
   
});
Route::post('check','GiamGiaController@CheckCode')->middleware('NhanVienLogin');;
Route::get('banhang','OderController@getIndex')->middleware('NhanVienLogin');

Route::get('thongkedt',function(){
    return view('admin.thongke.doanhthu');
})->middleware('AdminLogin');
Route::get('thongkenl',function(){
    return view('admin.thongke.nguyenlieu');
})->middleware('AdminLogin');

Route::post('ajax_save_bill','AjaxController@save_bill');
Route::post('ajax_list_san_pham','AjaxController@list_san_pham');
Route::post('ajax_find_customer','AjaxController@find_customer');
Route::post('ajax_check_email','DangNhapController@CheckEmail');
Route::post('ajax_thong_ke','AjaxController@thong_ke');
Route::post('ajax_CT_hoa_don','AjaxController@CT_hoa_don');
Route::post('ajax_day_off','AjaxController@day_off');
Route::post('ajax_bonus','AjaxController@ajax_bonus');
Route::post('ajax_day_off_one','AjaxController@day_off_one');