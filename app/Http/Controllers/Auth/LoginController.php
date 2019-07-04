<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use EasyWeChat\Kernel\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

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

        $user = User::query()->where('unionid', $data['unionid'])->first();

        if ($user) {
            $user->update([
                'name' => $data['nickname'],
                'avatar' => $data['photo'],
            ]);
        } else {
            User::query()->create([
                'password' => bcrypt(Str::random()),
                'name' => $data['nickname'],
                'avatar' => $data['photo'],
                'unionid' => $data['unionid'],
            ]);
        }

        $cookie = cookie('api_token', $user->api_token, 0, null, null, false, false);
        return back()->withCookie($cookie);
    }

    public function github(Request $request)
    {
        $back_url = $request->input('back_url');
        $request->session()->put('github_back_url', $back_url);
        return Socialite::driver('github')->redirect();
    }

    public function githubCallBack(Request $request)
    {
        $github = Socialite::driver('github')->user();

        //github 会返回email 先检测email是否注册
        $user = User::query()->where('email', $github->email)->first();//先检查 github 账号，是否授权过

        if ($user) {
            $user->update([
                'name' => $github->nickname,
                'avatar' => $github->avatar,
                'github_id' => $github->id,
            ]);
        } else {
            //检测github_id
            $user = User::query()->where('github_id', $github->id)->first();//先检查 github 账号，是否授权过

            if ($user) {
                $user->update([
                    'name' => $github->nickname,
                    'avatar' => $github->avatar,
                ]);
            } else {
                $user = User::query()->create([
                    'password' => bcrypt(Str::random()),
                    'name' => $github->nickname,
                    'avatar' => $github->avatar,
                    'github_id' => $github->id,
                    'email' => $github->email,
                ]);
            }
        }
        $back_url = $request->session()->get('github_back_url', route('index'));
        $cookies = [
            cookie('api_token', $user->api_token, 0, null, null, false, false),
            cookie('avatar', $github->avatar, 0, null, null, false, false),
        ];

        return redirect($back_url)->withCookies($cookies);
    }
}
