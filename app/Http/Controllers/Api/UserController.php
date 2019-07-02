<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 身份验证通过...
            return Auth::user();
        }
        return 0;
    }

    public function store(Request $request)
    {
        if ($request->input('unionid')){//扫码注册，微信给的ID都是固定的，所以可以看出是同一账号
            $user = User::query()->where('unionid', $request->input('unionid'))->first();
        }else{//正常注册
            $user = User::query()->where('email', $request->input('email'))->first();
            if ($user){//todo 如果 email 已经被注册，返回错误信息
                return 0;
            }
        }
        if ($user) {
            $user->update($request->only([
                'email',
                'name',
                'avatar',
            ]));
            return $user;
        } else {
            $result = User::query()->create($request->only([
                'unionid',
                'email',
                'name',
                'avatar',
                'password'
            ]));
            return $result;
        }
    }
}
