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
use App\Models\Sitemap;

$app->get('/sitemap', function () use ($app) {
    $map = new Sitemap();
	return $map->create_xml();
});

$app->get("/",'MainController@GetIndex');
$app->get("/about",'MainController@GetAbout');
$app->get("/album",'AlbumController@GetAlbumList');
$app->get("/album/{id}",'AlbumController@GetPhoList');

//TODO:ID获取文章{考虑写到路由群组里面，并且还要权限验证 By:mei 20151011}
$app->get("/post/{id}.html",'PostController@getpost');
//更新文章
$app->post("/post/update",'PostController@update');

$app->get("/test",function(){
	return bcrypt('kshz137');
    return Hash::check('kshz137','$2y$10$IkEZKueOdkx.5C50B5RP3ONEOIdiHgv9OIng6JinNBoYrNtuCNPcq2')?1:2;
});

$app->get('/test2', function() use ($app) {
	if (Auth::check())
	{
		return '1';
	}
	return '2';
});

$app->get("/home",function(){
    home_url();
});

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
    $app->get("{view}.html",function($view){
        return view('admin.'.$view);
    });
	/**
	 * 获取后台相关数据
	 */
	$app->get("/post-list",'AdminController@GetAllPost');
});

//登录视图
$app->get("/login",'AdminController@login_view');
//$app->get("/login",'AdminController@login');

$app->get("/Post/GetPost/",'PostController@GetListPost');

//$app->get("/Post/GetPost/{id}",'PostController@GetPost');


$app->group(['prefix' => 'User','namespace'=>'App\Http\Controllers'], function($app) {
    $app->post("/login",'UserController@get_login');
    $app->get("/logout",'UserController@logout');
});