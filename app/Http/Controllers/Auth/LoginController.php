<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use EasyWeChat\Kernel\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function wechatCallBack(Request $request)
    {

        $data = json_decode($request->input('data'), true);
        $api_token = Str::random(80);

        $user = User::query()->where('unionid', $data['unionid'])->first();

        if ($user) {
            $user->update([
                'name' => $data['nickname'],
                'avatar' => $data['photo'],
                'api_token' => $api_token
            ]);
        } else {
            User::query()->create([
                'password' => bcrypt(Str::random()),
                'name' => $data['nickname'],
                'avatar' => $data['photo'],
                'api_token' => $api_token,
                'unionid' => $data['unionid'],
            ]);
        }

        $cookie = cookie('api_token', $api_token, 0, null, null, false, false);
        return back()->withCookie($cookie);
    }

    public function githubCallBack(Request $request)
    {
        dd($request->input('data'));
    }
}
