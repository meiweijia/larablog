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
            return redirect()->intended('dashboard');
        }
    }

    public function store(Request $request)
    {
        $user = User::query()->where('unionid', $request->input('unionid'))->first();
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
            ]));
            return $result;
        }
    }
}
