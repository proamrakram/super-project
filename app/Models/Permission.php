<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manage_mediators',
        'can_add_offers',
        'can_edit_offers',
        'can_show_offers',
        'can_delete_offers',
        'can_cancel_offers',
        'can_add_orders',
        'can_edit_orders',
        'can_show_orders',
        'can_delete_orders',
        'can_cancel_orders',
        'can_add_vouchers',
        'can_edit_vouchers',
        'can_show_vouchers',
        'can_delete_vouchers',
        'can_cancel_vouchers',
        'can_add_sells',
        'can_edit_sells',
        'can_show_sells',
        'can_delete_sells',
        'can_cancel_sells',
        'can_booking',
        // 'can_send_sms',
        'can_send_sms_collection',
        'can_send_sms_individually',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeGetPermissions($query, $user_id)
    {
        $query->where('user_id', $user_id)->select([
            'manage_mediators',
            'can_add_offers',
            'can_edit_offers',
            'can_show_offers',
            'can_delete_offers',
            'can_cancel_offers',
            'can_add_orders',
            'can_edit_orders',
            'can_show_orders',
            'can_delete_orders',
            'can_cancel_orders',
            'can_add_vouchers',
            'can_edit_vouchers',
            'can_show_vouchers',
            'can_delete_vouchers',
            'can_cancel_vouchers',
            'can_add_sells',
            'can_edit_sells',
            'can_show_sells',
            'can_delete_sells',
            'can_cancel_sells',
            'can_booking',
            // 'can_send_sms',
            'can_send_sms_collection',
            'can_send_sms_individually',
        ]);
    }
}
