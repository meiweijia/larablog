<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\PasswordHash;
use Session;

class User extends Model{
	protected $table = 'm_users';
	private $input;
	
	public function __construct()
	{
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
	function get_login($account)
	{
		$users = $this->where('user_login',$account)->select('id','user_login','user_pass')->get()->toArray();
		return $users;
	}
	/*
	*用户登出功能
	*/
	function logout()
	{
		Session::flush();
	}
}