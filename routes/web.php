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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 测试获取淘宝的数据列表
// 首页
Route::get('test', 'TestController@index')->name('t.index');
// 获取数据列表
Route::get('test/getListData', 'TestController@getListData')->name('t.getListData');
// 生成图片
Route::get('getPicture', 'TestController@getPicture')->name('t.getPicture');
// 生成文案
Route::get('getContent', 'TestController@getContent')->name('t.getContent');
// 发布
Route::post('post', 'TestController@post')->name('t.post');
