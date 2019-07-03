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
            return response(Auth::user());
        }
        return response(['message' => '账号或者密码错误'], 400);
    }

    public function store(Request $request)
    {
        if ($request->input('unionid')) {//扫码注册，微信给的ID都是固定的，所以可以看出是同一账号
            $user = User::query()->where('unionid', $request->input('unionid'))->first();
        } else {//正常注册
            $user = User::query()->where('email', $request->input('email'))->first();
            if ($user) {
                return response(['message' => 'Email 已經被註冊！'], 400);
            }
        }
        if ($user) {
            $user->update($request->only([
                'email',
                'name',
                'avatar',
            ]));
            return response($user);
        } else {
            $result = User::query()->create($request->only([
                'unionid',
                'email',
                'name',
                'avatar',
                'password'
            ]));
            return response($result);
        }
    }
}
