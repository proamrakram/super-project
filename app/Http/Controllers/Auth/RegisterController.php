<?php

namespace App\Http\Controllers\Auth;

use App\Events\NewUser as EventsNewUser;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserSettings;
use App\Notifications\NewUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'register_name' => ['required', 'string', 'max:255'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'register_phone' => ['required', 'string', 'max:255', 'unique:users,phone'],
            'register_password' => ['required', 'string'],
        ], [
            'register_name.required' => 'الاسم مطلوب',
            'register_email.required' => 'الايميل مطلوب',
            'register_phone.required' => 'رقم الهاتف مطلوب',
            'register_password.required' => 'كلمة السر مطلوبة',

            'register_email.unique' =>  'هذا الايميل مستخدم من قبل',
            'register_phone.unique' =>  'رقم الهاتف مستخدم من قبل',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['register_name'],
            'phone' => $data['register_phone'],
            'email' => $data['register_email'],
            'password' => Hash::make($data['register_password']),
            'user_type' => 'marketer',
            'user_status' => 'inactive',
        ]);

        Permission::create([
            'user_id' => $user->id,
            'can_add_offers' => 2,
            'can_edit_offers' => 2,
            'can_show_offers' => 2,
            'can_delete_offers' => 2,
            'can_cancel_offers' => 2,
            'can_add_orders' => 2,
            'can_edit_orders' => 2,
            'can_show_orders' => 2,
            'can_delete_orders' => 2,
            'can_cancel_orders' => 2,
            'can_add_vouchers' => 2,
            'can_edit_vouchers' => 2,
            'can_show_vouchers' => 2,
            'can_delete_vouchers' => 2,
            'can_cancel_vouchers' => 2,
            'can_add_sells' => 2,
            'can_edit_sells' => 2,
            'can_show_sells' => 2,
            'can_delete_sells' => 2,
            'can_cancel_sells' => 2,
            'can_booking' => 2,
            'can_send_sms' => 2,
        ]);

        UserSettings::create([
            'user_id' => $user->id,
            'website_mode' => ''
        ]);

        $admins = User::whereIn('user_type', ['superadmin', 'admin'])->get();
        Notification::send($admins, new NewUser($user));
        event(new EventsNewUser($user));

        return $user;
    }
}
