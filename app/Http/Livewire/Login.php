<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\SmsService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    public $login_phone_email;
    public $login_password;
    public $method;

    public $user;

    public $time = '03:00';
    public $timer = 180;

    public $verification_code;

    public function timer()
    {
        if ($this->user) {
            if (!$this->user->can_recieve_sms) {
                $this->timer = ($this->timer - 1);
                if ($this->timer == 0) {
                    $this->user->update(['can_recieve_sms' => 1]);
                    $this->timer = 180;
                    $this->time = '03:00';
                    $this->user = User::find($this->user->id);
                }
                $this->time = date('i:s', mktime(0, 0, $this->timer));
            }
        }
    }

    public function render()
    {
        return view('livewire.login');
    }


    public function login()
    {
        $validatedData = $this->validate();

        $this->username();

        if ($this->method == 'phone') {
            $user = User::where('phone', $this->login_phone_email)->first();

            if ($user) {
                if (!$user->email_verified_at) {
                    $user->update(['can_recieve_sms' => 1]);
                    $this->user = User::where('phone', $this->login_phone_email)->first();
                    $this->alert('warning', '', [
                        'toast' => true,
                        'position' => 'center',
                        'timer' => 6000,
                        'text' => '👍 يرجى التحقق من رقم الهاتف قبل تسجيل الدخول',
                        'timerProgressBar' => true,
                    ]);
                    return false;
                }
            }

            $this->user = $user;

            if ($this->user && Hash::check($this->login_password, $this->user->password)) {
                Auth::login($this->user);
                return redirect()->intended('panel/home');
            }
        } elseif ($this->method == 'email') {

            $user = User::where('email', $this->login_phone_email)->first();

            if ($user) {
                if (!$user->email_verified_at) {
                    $user->update(['can_recieve_sms' => 1]);
                    $this->user = User::where('phone', $this->login_phone_email)->first();
                    $this->alert('warning', '', [
                        'toast' => true,
                        'position' => 'center',
                        'timer' => 6000,
                        'text' => '👍 يرجى التحقق من رقم الهاتف قبل تسجيل الدخول',
                        'timerProgressBar' => true,
                    ]);
                    return false;
                }
            }

            $this->user = $user;

            if ($this->user && Hash::check($this->login_password, $this->user->password)) {
                Auth::login($this->user);
                return redirect()->intended('panel/home');
            }
        } else {
            return back()->withErrors([
                'login_phone_email' => 'البيانات المتوفر  غير متطابقة',
            ])->onlyInput('login_phone_email');
        }
    }

    protected function rules()
    {
        $user_method_login =  $this->username();

        if ($user_method_login == 'phone') {

            $this->method = 'phone';
            return [
                'login_phone_email' => 'required|string|exists:users,phone',
                'login_password' => 'required|string',
            ];
        }

        if ($user_method_login == 'email') {

            $this->method = 'email';

            return [
                'login_phone_email' => 'required|string|email|exists:users,email',
                'login_password' => 'required|string',
            ];
        }
    }

    protected function messages()
    {
        $user_method_login =  $this->username();

        if ($user_method_login == 'phone') {

            $this->method = 'phone';
            return  [
                'login_phone_email.required' => 'يرجى إدخال رقم جوال او ايميل',
                'login_phone_email.exists' => 'رقم الجوال المدخل غير موجود',
                'login_password.required' => 'كلمة السر مطلوبة'
            ];
        }

        if ($user_method_login == 'email') {

            $this->method = 'email';

            return [
                'login_phone_email.required' => 'يرجى إدخال رقم جوال او ايميل',
                'login_phone_email.exists' => 'البريد الالكتروني المدخل غير موجود',
                'login_password.required' => 'كلمة السر مطلوبة'
            ];
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function username()
    {
        $word = '@';

        if (strpos($this->login_phone_email, $word) !== false) {
            $this->method = 'email';
            return 'email';
        } else {
            $this->method = 'phone';
            return 'phone';
        }

        $this->method = 'email';
        return 'email';
    }


    public function sendSms()
    {
        if ($this->user->verification_code == $this->verification_code) {
            $this->user->update([
                'verification_code' => null,
                'email_verified_at' => now()
            ]);

            $this->alert('success', '', [
                'toast' => true,
                'position' => 'center',
                'timer' => 9000,
                'text' => 'شكرا لك، لقد تم التحقق من حالة الحساب الخاص بك بنجاح، يمكنك الان تسجيل الدخول',
                'timerProgressBar' => true,
            ]);

            return redirect()->route('login');
        }
    }

    public function resendSms(SmsService $smsService)
    {
        $code = random_int(111111, 999999);

        if ($this->user) {

            $this->user->update([
                'verification_code' => $code,
                'can_recieve_sms' => 0
            ]);

            // $result = $smsService->send($this->user);

            $this->alert('warning', '', [
                'toast' => true,
                'position' => 'center',
                'timer' => 9000,
                'text' => 'لقد قمنا بإرسال كود تحقق جديد، تفقد الهاتف الخاص بك',
                'timerProgressBar' => true,
            ]);

            $this->user = User::find($this->user->id);
            $this->timer = 180;
            $this->time = '03:00';
        }
    }
}
