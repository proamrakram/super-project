<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function changePassword()
    {
        $user = User::find(auth()->id());

        $check = Hash::check($this->request->old_password, $user->password);


        if (($this->request->new_password != $this->request->confirm_new_password) && !$check) {
            return redirect()->back()
                ->with('old_password', 'يرجى إدخال كلمة المرور الصحيحة')
                ->with('confirm_new_password', 'كلمة المرور غير متطابقة')
                ->with('new_password', 'كلمة المرور غير متطابقة');
        }

        if ($this->request->new_password != $this->request->confirm_new_password) {
            return redirect()->back()
                ->with('confirm_new_password', 'كلمة المرور غير متطابقة')
                ->with('new_password', 'كلمة المرور غير متطابقة');
        }

        if (!$check) {
            return redirect()->back()->with('old_password', 'يرجى إدخال كلمة المرور الصحيحة');
        }


        $user->update([
            'password' => Hash::make($this->request->new_password)
        ]);

        return redirect()->back()->with('message', 'تم تغيير كلمة المرور بنجاح');
    }

    public function resetPassword()
    {
        $user = User::find($this->request->user_id);

        if ($user) {
            $check = Hash::check($this->request->reset_password_new, $user->password);

            if (!$check) {
                if ($this->request->reset_password_new != $this->request->reset_password_confirm) {
                    return redirect()->route('page.reset.password', $user->id)
                        ->with('reset_password_new', 'كلمة المرور غير متطابقة')
                        ->with('reset_password_confirm', 'كلمة المرور غير متطابقة');
                }

                $user->update([
                    'password' => Hash::make($this->request->reset_password_new)
                ]);

                return redirect()->route('login')->with('message', 'تم تحديث كلمة المرور بنجاح');
            }

            return redirect()->route('page.reset.password', $user->id)->with('reset_password_new', 'كلمة المرور مستخدمة سابقا!!');
        }
    }
}
