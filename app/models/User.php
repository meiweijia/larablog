<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Request;
use Illuminate\Support\Facades\Auth;

class User extends Model{
	protected $table = 'm_users';
	private $input;
	
	public function __construct()
	{
		$this->input = Request::all();;
	}
	function GetUser()
	{
		print_r($this->input);
		$res = $this->where('id',1)->get()->toArray();
		return $res;
	}
	
	/*
	*用户登录功能
	*/
	function login()
	{
		$user_login = isset($this->input['account'])?$this->input['account']:'';
		$password = isset($this->input['password'])?$this->input['password']:'';
		if (Auth::attempt(['user_login' => $user_login, 'password' => $password]))
		{
			return redirect()->intended('dashboard');
		}
		$res['msg']='登录失败';
		$res['success'] = false;
		return $res;
	}
	/*
	*用户登出功能
	*/
	function logout()
	{
		Session::flush();
	}
}