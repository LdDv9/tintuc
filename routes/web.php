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

//login logout admin
Route::get('admin/dangnhap','UserController@getAdminDangnhap');
Route::post('admin/dangnhap','UserController@postAdminDangnhap')->name('admin.dangnhap');
Route::get('admin/dangxuat','UserController@getAdminDangXuat')->name('admin.dangxuat');
//

Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){
	Route::resource('theloai','TheLoaiController');
	Route::resource('loaitin','LoaiTinController');
	Route::resource('tintuc','TinTucController');
	Route::resource('user','UserController');
	Route::resource('slide','SlideController');
	Route::resource('comment','CommentController');
	
});
Route::group(['prefix'=>'admin/tintuc'],function(){
	Route::get('/ajax/loaitin/{idTheLoai}','AjaxController@getLoaiTin');
});
Route::get('ajax/loaitin/{idTheLoai}','AjaxController@getLoaiTin');

// page
Route::get('/','PageController@TrangChu');
Route::get('lienhe','PageController@Lienhe');
Route::get('loaitin/{id}/{TenKhongDau}.html','PageController@LoaiTin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PageController@TinTuc');
Route::get('thongtin/{id}','PageController@getThongTin');
Route::post('thongtin/{id}','PageController@postThongTin')->name('suanguoidung');
Route::get('dangky','PageController@getDangKy');
Route::post('dangky','PageController@postDangKy')->name('dangky');
Route::post('comment','PageController@postComment')->name('comment');
Route::get('timkiem','PageController@TimKiem')->name('timkiem');

//dangnhap user

Route::get('dangnhap','UserController@getDangNhap');
Route::post('dangnhap','UserController@postDangNhap')->name('dangnhap');
Route::get('dangxuat','UserController@getDangXuat')->name('dangxuat');

