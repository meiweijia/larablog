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

/*
 * 主页
 */
Route::get('/','MainController@index');

Route::get('/page/{page?}','MainController@index');
/*
 * 关于
 */
Route::get('/about.html','MainController@about');

/*
 * 工作
 */
Route::get('/work.html','MainController@work');

/*
 * 联系
 */
Route::get('/contact.html','MainController@contact');

Route::get('qianyi','MainController@qianyi');

/*
 * 后台
 */
Route::middleware(['auth',])->prefix('admin')->group(function () {
    Route::get('/', function () {
        // 使用 first 和 second 中间件
    });

    Route::get('user/profile', function () {
        // 使用 first 和 second 中间件
    });
});

/*
 * 文章
 */
Route::resource('article', 'ArticlesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
