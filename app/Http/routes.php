<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get("/",'MainController@GetIndex');
$app->get("/s={word}",'MainController@Search');
$app->get("/about",'MainController@GetAbout');
$app->get("/album",'AlbumController@GetAlbumList');
$app->get("/album/{id}",'AlbumController@GetPhoList');
$app->get("/talk",'MainController@GetTalk');
$app->get("/sitemap.xml",'MainController@GetSiteMap');

$app->get("/post/{id}.html",'PostController@getpost');
$app->get("/comment/{pid}",'CommentController@getComment');
//更新文章
$app->post("/post/update",'PostController@update');

/*
后台路由
*/
$app->group(['prefix' => 'admin','namespace'=>'App\Http\Controllers','middleware' => 'auth'], function($app) {
	/*
	后台主页
	*/
    $app->get("/",'AdminController@GetIndex');
	/*
	加载视图
	*/
    $app->get("app/view/{view}.js",function($view){
        return view('admin.app.view.'.$view);
    });
	/**
	 * 获取后台相关数据
	 */
	$app->get("/post-list",'AdminController@GetAllPost');
	/**
	 * 文章相关
	 */
	$app->post("/post/update",'PostController@update');
	$app->get("/post/update",'PostController@update');
});

/**
 * Extjs视图加载
 */
$app->group(['prefix' => '','namespace'=>'App\Http\Controllers','middleware' => 'auth'], function($app) {
	/*
	加载视图
	*/
	$app->get("app/view/{view}.js",function($view){
		return view('app.view.'.$view);
	});
	$app->get("app/view/{dir}/{view}.js",function($dir,$view){
		return view('app.view.'.'.'.$dir.'.'.$view);
	});
});

//登录视图
$app->get("/login",'AdminController@login_view');

$app->get("/Post/GetPost/",'PostController@GetListPost');

/*
 *登录登出
 */
$app->group(['prefix' => 'User','namespace'=>'App\Http\Controllers'], function($app) {
    $app->post("/login",'UserController@get_login');
    $app->get("/logout",function() use($app){
		Auth::logout();
		header('location:'.home_url().'login');
	});
});
$app->get("/test1","MainController@GetTest");
$app->get("/test","CommentController@GetTest");
$app->get('/test2', function() {

	$txt = sprintf("%s%s%s%s",'asdf','asdf','asdf','asdf');
	echo $txt;
});
