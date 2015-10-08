<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller {

	public function __construct()
	{
	}
	
	public function login()
	{
		$userSrv = new User();
		return $userSrv->login();
	}
	
	public function logout()
	{
		$userSrv = new User();
		$userSrv->logout();
		header('location:'.home_url().'login');
	}
}