<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $method;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $this->validateLogin($request);

        if ($this->method == 'phone') {
            $user = User::where('phone', $credentials['login_phone_email'])->first();

            if ($user && Hash::check($request->login_password, $user->password)) {
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->intended('panel/home');
            } else {
                return redirect()->back()->with('password', 'بيانات الاعتماد غير متطابقة');
            }
        } elseif ($this->method == 'email') {
            $user = User::where('email', $credentials['login_phone_email'])->first();

            if ($user && Hash::check($request->login_password, $user->password)) {
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->intended('panel/home');
            } else {
                return redirect()->back()->with('password', 'بيانات الاعتماد غير متطابقة');
            }
        } else {
            return back()->withErrors([
                'login_phone_email' => 'البيانات المتوفر  غير متطابقة',
            ])->onlyInput('login_phone_email');
        }
    }

    public function validateLogin(Request $request)
    {
        $user_method_login =  $this->username();

        if ($user_method_login == 'phone') {

            $this->method = 'phone';

            return $request->validate([
                'login_phone_email' => 'required|string|exists:users,phone',
                'login_password' => 'required|string',
            ], [
                'login_phone_email.required' => 'يرحى إدخال رقم جوال او ايميل',
                'login_phone_email.exists' => 'رقم الجوال المدخل غير موجود',
                'login_password.required' => 'كلمة السر مطلوبة'
            ]);
        }

        if ($user_method_login == 'email') {

            $this->method = 'email';

            return $request->validate([
                'login_phone_email' => 'required|string|email|exists:users,email',
                'login_password' => 'required|string',
            ], [
                'login_phone_email.required' => 'يرحى إدخال رقم جوال او ايميل',
                'login_phone_email.exists' => 'البريد الالكتروني المدخل غير موجود',
                'login_password.required' => 'كلمة السر مطلوبة'
            ]);
        }
    }

    public function username()
    {
        $word = '@';

        if (strpos(request()->login_phone_email, $word) !== false) {
            return 'email';
        } else {
            return 'phone';
        }

        return 'email';
    }
}
