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
Route::get('/search/{q?}', 'HomeController@search')->name('search');
/**
 * 关于
 */
Route::get('/about', 'HomeController@about')->name('about');

Route::resource('articles', 'ArticleController', ['only' => ['show']]);

Route::post('/articles/comment','ArticleController@comment')->name('articles.comment');
