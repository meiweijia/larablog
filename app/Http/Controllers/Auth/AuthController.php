<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\AuthLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * 将用户重定向到GitHub认证页面
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * 从GitHub获取认证用户信息
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return Redirect::to('auth/github');
        }
        if (!AuthLogin::where('auth_id', $user->id)->first()) {
            $userModel = new AuthLogin;
            $userModel->auth_id = $user->id;
            $userModel->email = $user->email;
            $userModel->name = $user->name;
            $userModel->remember_token = $user->token;
            $userModel->avatar = $user->avatar;
            $userModel->save();
        }
        $userInstance = AuthLogin::where('auth_id',$user->id)->firstOrFail();
        Auth::login($userInstance);
        return redirect('/');
    }
}