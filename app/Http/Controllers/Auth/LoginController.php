<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * ログイン後の処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect('/')->with('success_message', 'ログインしました。');
    }

    /**
     * ゲストログイン
     * @return \Illuminate\Http\Response
     */
    protected function guestLogin()
    {
        if (\Auth::attempt(['email' => env('ORGANIZATION_ADMIN_MAIL'), 'password' => env('ORGANIZATION_ADMIN_PASSWORD')])) {
            return redirect('admin')->with('success_message', 'ログインしました。');
        }
        return back();
    }

    /**
     * ユーザーをログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        // ログアウトしたら、トップページへ移動
        return $this->loggedOut($request) ?: redirect('login')->with('success_message', 'ログアウトしました。');
    }
}
