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

//$app->get('/', function () use ($app) {
//    return DB::table('m_users')->get();
//});

$app->get("/",'MainController@GetIndex');


$app->get("/post/{id}.html",'PostController@getpost');

$app->get("/test",function(){
    return view('yf.post');
});

$app->get("/home",function(){
    home_url();
});

/*
后台路由
*/
$app->group(['prefix' => 'admin','namespace'=>'App\Http\Controllers','middleware' => 'auth'], function($app) {
    $app->get("/",'AdminController@GetIndex');
    $app->get("/{view}.html",function($view){
        return view('admin.'.$view);
    });
});
//登录
$app->get("/login",'AdminController@login_view');
$app->post("/login",'AdminController@login');

$app->get("/welcome.html",'AdminController@welcome');
$app->get("/article-list.html",'AdminController@article_list');
$app->get("/article-add.html",'AdminController@article_add');
$app->get("/rticle-zhang.html",'AdminController@rticle_zhang');
$app->get("/picture-list.html",'AdminController@picture_list');
$app->get("/system-base.html",'AdminController@system_base');


$app->get("/Post/GetPost/",'PostController@GetListPost');

//$app->get("/Post/GetPost/{id}",'PostController@GetPost');


$app->group(['prefix' => 'User','namespace'=>'App\Http\Controllers'], function($app) {
    $app->post("/login",'UserController@login');
    $app->get("/logout",'UserController@logout');
});