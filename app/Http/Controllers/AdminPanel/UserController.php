<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function storeInfo(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string',],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'unique:users,phone'],
            'password' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        UserSettings::create([
            'user_id' => $user->id,
            'website_mode' => ''
        ]);

        return redirect()->route('panel.create.user.permissions', [
            'email' => $user->email
        ]);
    }

    public function storeUserPermissions(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email',],
            // 'is_admin' => ['string', 'in:on,off',],
            // 'is_office' => ['string', 'in:on,off'],
            // 'is_finance' => ['string', 'in:on,off'],
            // 'is_monitor' => ['string', 'in:on,off'],
            // 'is_employee' => ['string', 'in:on,off'],
            'user_type' => ['required', 'in:admin,office,marketer'],

            'manage_mediators' => ['string', 'in:on,off'],
            'can_add_offers' => ['string', 'in:on,off'],
            'can_edit_offers' => ['string', 'in:on,off'],
            'can_show_offers' => ['string', 'in:on,off'],
            // 'can_delete_offers' => ['string', 'in:on,off'],
            'can_cancel_offers' => ['string', 'in:on,off'],

            'can_add_orders' => ['string', 'in:on,off'],
            'can_edit_orders' => ['string', 'in:on,off'],
            'can_show_orders' => ['string', 'in:on,off'],
            // 'can_delete_orders' => ['string', 'in:on,off'],
            'can_cancel_orders' => ['string', 'in:on,off'],

            'can_add_vouchers' => ['string', 'in:on,off'],
            'can_edit_vouchers' => ['string', 'in:on,off'],
            'can_show_vouchers' => ['string', 'in:on,off'],
            // 'can_delete_vouchers' => ['string', 'in:on,off'],
            'can_cancel_vouchers' => ['string', 'in:on,off'],

            'can_add_sells' => ['string', 'in:on,off'],
            'can_edit_sells' => ['string', 'in:on,off'],
            'can_show_sells' => ['string', 'in:on,off'],
            // 'can_delete_sells' => ['string', 'in:on,off'],
            'can_cancel_sells' => ['string', 'in:on,off'],

            'can_booking' => ['string', 'in:on,off'],
            // 'can_send_sms' => ['string', 'in:on,off'],
            'can_send_sms_collection' => ['string', 'in:on,off'],
            'can_send_sms_individually' => ['string', 'in:on,off'],

            'user_status' => ['string', 'in:on,off'],

            'branches_ids' => ['array'],
            'advertiser_number' => ['nullable', 'string'],

        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->update([
                // 'is_admin' => $request->is_admin ? 1 : 2,
                // 'is_office' => $request->is_office ? 1 : 2,
                // 'is_finance' => $request->is_monitor ? 1 : 2,
                // 'is_monitor' => $request->is_monitor ? 1 : 2,
                // 'is_employee' => $request->is_monitor ? 1 : 2,
                'user_type' => $request->user_type,
                // 'branches_ids' => $request->branches_ids ?? [],
                'advertiser_number' => $request->advertiser_number,
                'user_status' => $request->user_status ? 'active' : 'inactive', #user status
            ]);

            foreach ($request->branches_ids ?? [] as $branch_id) {
                if (!$user->branches->contains($branch_id)) {
                    $user->branches()->attach($branch_id);
                }
            }

            Permission::create([
                'user_id' => $user->id, #user id
                'manage_mediators' => $request->manage_mediators ? 1 : 2,
                #Offers
                'can_add_offers' => $request->can_add_offers ? 1 : 2,
                'can_edit_offers' => $request->can_edit_offers ? 1 : 2,
                'can_show_offers' => $request->can_show_offers ? 1 : 2,
                'can_delete_offers' => $request->can_delete_offers ? 1 : 2,
                'can_cancel_offers' => $request->can_cancel_offers ? 1 : 2,

                #Orders
                'can_add_orders' => $request->can_add_orders ? 1 : 2,
                'can_edit_orders' => $request->can_edit_orders ? 1 : 2,
                'can_show_orders' => $request->can_show_orders ? 1 : 2,
                'can_delete_orders' => $request->can_delete_orders ? 1 : 2,
                'can_cancel_orders' => $request->can_cancel_orders ? 1 : 2,

                #Vouchers
                'can_add_vouchers' => $request->can_add_vouchers ? 1 : 2,
                'can_edit_vouchers' => $request->can_edit_vouchers ? 1 : 2,
                'can_show_vouchers' => $request->can_show_vouchers ? 1 : 2,
                'can_delete_vouchers' => $request->can_delete_vouchers ? 1 : 2,
                'can_cancel_vouchers' => $request->can_cancel_vouchers ? 1 : 2,

                #Sells
                'can_add_sells' => $request->can_add_sells ? 1 : 2,
                'can_edit_sells' => $request->can_edit_sells ? 1 : 2,
                'can_show_sells' => $request->can_show_sells ? 1 : 2,
                'can_delete_sells' => $request->can_delete_sells ? 1 : 2,
                'can_cancel_sells' => $request->can_cancel_sells ? 1 : 2,

                'can_booking' => $request->can_booking ? 1 : 2,
                // 'can_send_sms' => $request->can_send_sms ? 1 : 2,
                'can_send_sms_collection' => $request->can_send_sms_collection ? 1 : 2,
                'can_send_sms_individually' => $request->can_send_sms_individually ? 1 : 2,
            ]);
        }

        return redirect()->route('panel.users');
    }

    public function updateInfo(Request $request, User $user)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'string', 'unique:users,phone,' . $user->id],
            // 'password' => ['required', 'string'],
        ]);

        $user->update([
            'name' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
        ]);

        return redirect()->route('panel.edit.user.permissions', $user->id);
    }


    public function updateUserPermissions(Request $request, User $user)
    {
        $request->validate([
            // 'is_admin' => ['string', 'in:on,off',],
            // 'is_office' => ['string', 'in:on,off'],
            // 'is_finance' => ['string', 'in:on,off'],
            // 'is_monitor' => ['string', 'in:on,off'],
            // 'is_employee' => ['string', 'in:on,off'],
            'user_type' => ['required', 'in:admin,office,marketer'],

            'manage_mediators' => ['string', 'in:on,off'],
            'can_add_offers' => ['string', 'in:on,off'],
            'can_edit_offers' => ['string', 'in:on,off'],
            'can_show_offers' => ['string', 'in:on,off'],
            // 'can_delete_offers' => ['string', 'in:on,off'],
            'can_cancel_offers' => ['string', 'in:on,off'],

            'can_add_orders' => ['string', 'in:on,off'],
            'can_edit_orders' => ['string', 'in:on,off'],
            'can_show_orders' => ['string', 'in:on,off'],
            // 'can_delete_orders' => ['string', 'in:on,off'],
            'can_cancel_orders' => ['string', 'in:on,off'],

            'can_add_vouchers' => ['string', 'in:on,off'],
            'can_edit_vouchers' => ['string', 'in:on,off'],
            'can_show_vouchers' => ['string', 'in:on,off'],
            // 'can_delete_vouchers' => ['string', 'in:on,off'],
            'can_cancel_vouchers' => ['string', 'in:on,off'],

            'can_add_sells' => ['string', 'in:on,off'],
            'can_edit_sells' => ['string', 'in:on,off'],
            'can_show_sells' => ['string', 'in:on,off'],
            // 'can_delete_sells' => ['string', 'in:on,off'],
            'can_cancel_sells' => ['string', 'in:on,off'],

            'can_booking' => ['string', 'in:on,off'],
            // 'can_send_sms' => ['string', 'in:on,off'],

            'can_send_sms_collection' => ['string', 'in:on,off'],
            'can_send_sms_individually' => ['string', 'in:on,off'],

            'user_status' => ['string', 'in:on,off'],

            'branches_ids' => ['array'],
            'advertiser_number' => ['nullable', 'string'],

        ]);


        if ($user) {
            $user->update([
                'user_status' => $request->user_status  ? 'active' : 'inactive',
                'branches_ids' => $request->branches_ids ?? [],
                'user_type' => $request->user_type,
                'advertiser_number' => $request->advertiser_number,
            ]);

            $permissions = $user->permissions;

            foreach ($request->branches_ids ?? [] as $branch_id) {
                if (!$user->branches->contains($branch_id)) {
                    $user->branches()->attach($branch_id);
                }
            }

            $permissions->update([
                #Manage Mediators
                'manage_mediators' => $request->manage_mediators ? 1 : 2,

                #Offers
                'can_add_offers' => $request->can_add_offers ? 1 : 2,
                'can_edit_offers' => $request->can_edit_offers ? 1 : 2,
                'can_show_offers' => $request->can_show_offers ? 1 : 2,
                'can_delete_offers' => $request->can_delete_offers ? 1 : 2,
                'can_cancel_offers' => $request->can_cancel_offers ? 1 : 2,

                #Orders
                'can_add_orders' => $request->can_add_orders ? 1 : 2,
                'can_edit_orders' => $request->can_edit_orders ? 1 : 2,
                'can_show_orders' => $request->can_show_orders ? 1 : 2,
                'can_delete_orders' => $request->can_delete_orders ? 1 : 2,
                'can_cancel_orders' => $request->can_cancel_orders ? 1 : 2,

                #Vouchers
                'can_add_vouchers' => $request->can_add_vouchers ? 1 : 2,
                'can_edit_vouchers' => $request->can_edit_vouchers ? 1 : 2,
                'can_show_vouchers' => $request->can_show_vouchers ? 1 : 2,
                'can_delete_vouchers' => $request->can_delete_vouchers ? 1 : 2,
                'can_cancel_vouchers' => $request->can_cancel_vouchers ? 1 : 2,

                #Sells
                'can_add_sells' => $request->can_add_sells ? 1 : 2,
                'can_edit_sells' => $request->can_edit_sells ? 1 : 2,
                'can_show_sells' => $request->can_show_sells ? 1 : 2,
                'can_delete_sells' => $request->can_delete_sells ? 1 : 2,
                'can_cancel_sells' => $request->can_cancel_sells ? 1 : 2,

                'can_booking' => $request->can_booking ? 1 : 2,
                // 'can_send_sms' => $request->can_send_sms ? 1 : 2,

                'can_send_sms_collection' => $request->can_send_sms_collection ? 1 : 2,
                'can_send_sms_individually' => $request->can_send_sms_individually ? 1 : 2,
            ]);
        }

        return redirect()->route('panel.users');
    }

    public function changeUserStatus(User $user)
    {
        if ($user->user_status == 'active') {
            $user->update(['user_status' => 'inactive']);
        } elseif ($user->user_status == 'inactive') {
            $user->update(['user_status' => 'active']);
        }

        return redirect()->route('panel.users')->with('message',  '👍 تم تحديث حالة المستخدم بنجاح',);
    }
}
