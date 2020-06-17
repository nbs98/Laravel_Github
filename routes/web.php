<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/',function(){
    return redirect()->route('home.get.index');
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/','HomeController@getIndex')->name('home.get.index');
    Route::get('/about','HomeController@getAbout')->name('home.get.about');

    Route::get('/info','HomeController@getInfo')->name('home.get.info');
    Route::post('/info','HomeController@postInfo')->name('home.post.info');

    Route::get('/chitiet/{id}/{tieuDe}','HomeController@getChiTiet')->name('home.get.chiTiet');


    Route::group(['prefix' => 'user'], function () {
        Route::get('/login','HomeController@getLogin')->name('home.get.login');
        Route::post('/login','HomeController@postLogin')->name('home.post.login');

        Route::get('/regis','HomeController@getRegis')->name('home.get.regis');
        Route::post('/regis','HomeController@postRegis')->name('home.post.regis');

        Route::get('/logout','HomeController@getLogout')->name('home.get.logout');

        
    });
});

Route::get('/admin',function(){
    return redirect()->route('admin.get.dashBroad');
});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashbroad','AdminController@getDashBroad')->name('admin.get.dashBroad');

    
    Route::group(['prefix' => 'news'], function () {
        Route::get('/tintuc','NewsController@getTinTuc')->name('admin.get.tinTuc');
        
        Route::get('/xoatin/{id}','NewsController@xoaTin')->name('admin.get.xoaTin');

        Route::get('/themTin','NewsController@getThemTin')->name('admin.get.themTin');
        Route::post('/themTin','NewsController@postThemTin')->name('admin.post.themTin');
        Route::get('/loadSelect/{idTheLoai}','NewsController@loadSelect');

        Route::get('/theloai','NewsController@getTheLoai')->name('admin.get.theLoai');
        Route::post('/theloai','NewsController@postTheloai')->name('admin.post.theLoai');

        Route::get('/loaitin','NewsController@getLoaiTin')->name('admin.get.loaiTin');
        Route::post('/loaitin','NewsController@postLoaiTin')->name('admin.post.loaiTin');


        Route::get('/delete-TL/{id}','NewsController@deleteTL')->name('admin.deleteTL');

        Route::get('/delete-LT/{id}','NewsController@deleteLT')->name('admin.deleteLT');
    });

    Route::group(['prefix' => 'account'], function () {
        Route::get('/listAccount','AdminController@getListAccount')->name('admin.get.listAccount');
    });
});
