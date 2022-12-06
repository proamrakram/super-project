<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'status',
        'order_id',
        'user_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'note',
            'status',
            'order_id',
            'user_id',
        ]);
    }
}
