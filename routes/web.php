<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/','AdminController@dashboard')->name('dashboard');
    Route::prefix('users')->name('users.')->group(function() {
        Route::get('datatable','UserController@getDatatable')->name('datatable');
        Route::any('/{user}/publish','UserController@publish')->name('publish');
    });

    Route::prefix('groups')->name('groups.')->group(function() {
        Route::get('datatable','GroupController@getDatatable')->name('datatable');
    });

    Route::prefix('permissions')->name('permissions.')->group(function() {
        Route::get('datatable','PermissionController@getDatatable')->name('datatable');
    });

    Route::prefix('categories')->name('categories.')->group(function() {
        Route::get('datatable','CategoryController@getDatatable')->name('datatable');
        Route::any('/{category}/publish','CategoryController@publish')->name('publish');
    });

    Route::prefix('posts')->name('posts.')->group(function() {
        Route::get('datatable','PostController@getDatatable')->name('datatable');
        Route::any('/{post}/publish','PostController@publish')->name('publish');
    });

    Route::prefix('menucategories')->name('menucategories.')->group(function() {
        Route::get('datatable','MenuCategoryController@getDatatable')->name('datatable');
        Route::any('/{post}/publish','MenuCategoryController@publish')->name('publish');
    });

    Route::prefix('diems')->name('diems.')->group(function() {
        Route::get('nhap-diem','DiemController@nhapdiem')->name('nhapdiem');
        Route::get('tra-cuu-diem','DiemController@tracuudiem')->name('tracuudiem');
        Route::post('thuc-hien-nhap-diem','DiemController@performNhapdiem')->name('thnhapdiem');
        Route::any('kiem-tra-diem-theo-mshv','DiemController@checkDiemByMSHV')->name('checkdiembymshv');
    });

    Route::prefix('hocviens')->name('hocviens.')->group(function() {
        Route::get('nhap-hoc-vien','HocVienController@getImport')->name('nhaphv');
        Route::get('datatable','HocVienController@getDatatable')->name('datatable');
        Route::post('process-import','HocVienController@processImport')->name('processimport');
        Route::any('kiem-tra-hoc-vien-theo-mshv','HocVienController@checkHVByMSHV')->name('checkhvbymshv');
    });

    Route::prefix('lops')->name('lops.')->group(function() {
        Route::any('hvtheolop','LopController@getHocvienTheoLop')->name('hvtheolop');
    });

    Route::prefix('qdthis')->name('qdthis.')->group(function() {
        Route::get('xet-dieu-kien-du-thi','QuyetDinhThiController@xetDkdtForm')->name('xetdkdtfrm');
        Route::any('laydshv','QuyetDinhThiController@layDsHv')->name('laydshv');
    });
    
    // Resource shoud be placed behind static
    Route::resource('users','UserController');    
    Route::resource('groups','GroupController');    
    Route::resource('permissions','PermissionController');             
    Route::resource('categories','CategoryController');        
    Route::resource('posts','PostController');               
    Route::resource('menucategories','MenuCategoryController');        
    Route::resource('qdthis','QuyetDinhThiController');        
    Route::resource('diems','DiemController');        
    Route::resource('hocviens','HocVienController');        
    Route::resource('lops','LopController');        
});


