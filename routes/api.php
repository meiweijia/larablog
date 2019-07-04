<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/articles/{article}/comment', 'ArticleController@commentShow')->name('api.articles.comment.show');
Route::get('/comments/more_children/{id}', 'ArticleController@getChildrenComments')->name('api.articles.comment.show.more_children');
Route::post('/articles/{article}/comment', 'ArticleController@commentStore')->name('api.articles.comment.store');

Route::resource('user', 'Api\UserController')->only('store')->names('api.user');
Route::post('login','Api\UserController@login')->name('api.login');