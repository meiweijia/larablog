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

Route::get('/articles/{article}/comment','ArticleController@commentShow')->name('articles.comment.show');
Route::get('/comments/more_children/{id}','ArticleController@getChildrenComments')->name('articles.comment.show.more_children');
Route::post('/articles/{article}/comment','ArticleController@commentStore')->name('articles.comment.store');
