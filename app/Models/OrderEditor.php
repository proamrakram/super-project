<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderEditor extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'note',
        'action',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'order_id',
            'user_id',
            'note',
            'action',
            'created_at',
        ]);
    }
}
