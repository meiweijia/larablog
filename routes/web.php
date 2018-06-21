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
Route::get('/', 'MainController@index')->name('root');

Route::get('/categories/{name}', 'MainController@getArticleByCategory')->name('Category');

Route::get('/page/{page?}', 'MainController@index')->name('page');

Route::get('/resume', 'MainController@resume')->name('resume');

Route::get('sitemap.xml','MainController@siteMap')->name('sitemap');
/*
 * 关于
 */
Route::get('/about', 'MainController@about')->name('about');

/*
 * 工作
 */
Route::get('/work', 'MainController@work')->name('work');

/*
 * 联系
 */
Route::get('/contact', 'MainController@contact');

Route::get('qianyi', 'MainController@qianyi');

///*
// * 后台
// */
//Route::middleware(['auth',])->prefix('admin')->group(function () {
//    Route::get('/', function () {
//        // 使用 first 和 second 中间件
//    });
//
//    Route::get('user/profile', function () {
//        // 使用 first 和 second 中间件
//    });
//});

/*
 * 文章
 */
Route::resource('article', 'ArticleController', ['only' => ['index', 'show']]);

Route::resource('comment', 'CommentController', ['only' => ['store']]);

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
