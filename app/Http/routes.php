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

//ID获取文章
$app->get("/post/{id}.html",'PostController@getpost');

$app->get("/test",function(){
    //return Hash::check('kshz137','$2y$10$IkEZKueOdkx.5C50B5RP3ONEOIdiHgv9OIng6JinNBoYrNtuCNPc')?1:2;
});

$app->get("/home",function(){
    home_url();
});

/*
后台路由
*/
$app->group(['prefix' => 'admin','namespace'=>'App\Http\Controllers','middleware' => 'auth'], function($app) {
    $app->get("/",'AdminController@GetIndex');
    $app->get("{view}.html",function($view){
        return view('admin.'.$view);
    });
});
//登录视图
$app->get("/login",'AdminController@login_view');




$app->get("/Post/GetPost/",'PostController@GetListPost');

//$app->get("/Post/GetPost/{id}",'PostController@GetPost');


$app->group(['prefix' => 'User','namespace'=>'App\Http\Controllers'], function($app) {
    $app->post("/login",'UserController@get_login');
    $app->get("/logout",'UserController@logout');
});