<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Sort;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {
	
	public function __construct()
	{

	}
	
	/*加载登录视图*/
	public function login_view()
	{
		return view('admin.login');
	}

	public function login(Request $request)
	{
		//print_r($request->only('user_login', 'user_pass'));
		if (Auth::attempt($request->only('user_login', 'user_pass'))) {
			return '认证成功';
			return redirect()->intended('dashboard');
		}else{
			return '认证失败';
		}
	}

	/**
	 * 返回所有文章
	 */
	function GetAllPost(Request $request)
	{
		DB::connection()->enableQueryLog();
		$postSrv = new Post();
		$res = $postSrv->GetAllPost($request->all());
		$res['success'] = $res['data']?true:false;
		$res['sql'] = DB::getQueryLog();
		return json_encode($res, JSON_UNESCAPED_UNICODE);
	}

	function GetAllSort(Request $request)
	{
		DB::connection()->enableQueryLog();
		$sortSrv = new Sort();
		$res = $sortSrv->GetAllSort($request->all());
		$res['success'] = $res['data']?true:false;
		$res['sql'] = DB::getQueryLog();
		return json_encode($res, JSON_UNESCAPED_UNICODE);
	}

	public function GetIndex()
	{
		return view('admin.index');
	}
}