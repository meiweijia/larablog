<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use Closure;

class UserController extends Controller
{

    public function __construct()
    {
    }

    public function get_login(Request $request)
    {
        $input = $request->all();
        $rem = $input['remember'] == '1' ? true : false;
        if (Auth::attempt($request->only('user_login', 'password'), $rem)) {
            return array('msg' => '登录成功', 'success' => true);
        } else {
            return array('msg' => '账号或密码错误', 'success' => false);
        }
    }

    public function logout()
    {
        $userSrv = new User();
        $userSrv->logout();
        header('location:' . home_url() . 'login');
    }
}
