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

/**
 * 主页
 */
Route::get('/', 'HomeController@index')->name('index');
/**
 * 根据分类获取
 */
Route::get('/categories/{name}', 'HomeController@getArticleByCategory')->name('getArticleByCategory');
/**
 * 根据标签获取
 */
Route::get('/tags/{name}', 'HomeController@getArticleByTag')->name('getArticleByTag');
/**
 * 搜索
 */
Route::get('/search', 'HomeController@search')->name('search');
/**
 * 关于
 */
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');

Route::get('/login/wechat/callback', 'Auth\LoginController@wechatCallBack')->name('login.wechat.callback');//扫码登录回调
Route::get('/login/github','Auth\LoginController@github')->name('login.github');
Route::get('/login/github/callback', 'Auth\LoginController@githubCallBack')->name('login.github.callback');//github 登录回调

Route::get('test', function () {
    $encryptedString = "eyJpdiI6IlwvR1hjUjRIMDNpRTNmSDBEZHRzTmtnPT0iLCJ2YWx1ZSI6IlFBMVc0SjVWUHZuSFFzVnRZMVY2Tzl0cTBlQVZ1MDRoVzYyYUpjeGJRUmZcLytpTStXK3l0VUN2U0gyeStBMGtcL0NUTUcxcmVvZ3hqODhoc2w0NmNoZDBIVHpjQkpFUjVCVkE2QkU4eUpQb1dhZUsrUjRnOXlPVXNTdHZJR3F4RjciLCJtYWMiOiIyMTg0MTM4YmRhYjEzOGFhNTY5NTczOWRhM2E4YzFmZTJmYjMwMjNhYzliNGEwZDE4OGEzMDQzMmFkNTE2NTQ4In0=";

    $decryptedString = \Crypt::decryptString($encryptedString);
    dd($decryptedString);
});
