<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use Closure;

class UserController extends Controller {

	public function __construct()
	{
	}
	
	public function get_login(Request $request)
	{
		$input = $request->only('user_login', 'password');
		if (Auth::attempt($request->only('user_login', 'password'),true)) {
			Session::put('account',$input['user_login']);
			return array('msg'=>'登录成功','success'=>true);
		}else{
			return array('msg'=>'账号或密码错误','success'=>false);
		}
		// $input = $request->only('user_login','user_pass');
		// $account = $input['user_login'];
		// $password = $input['user_pass'];
		// $userSrv = new User();
		// $user = $userSrv->get_login($account);
		// if(!isset($user[0]))
		// {
			// return '0';
		// }
		// $hashedPassword = $user[0]['user_pass'];
		// if (!Hash::check($password, $hashedPassword))
		// {
			// return '0';
		// }
		// Session::put('account',$account);
		// return '1';
	}
	
	public function logout()
	{
		$userSrv = new User();
		$userSrv->logout();
		header('location:'.home_url().'login');
	}
}