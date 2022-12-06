<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'customer_name',
        'price',
        'status',
        'date_from',
        'date_to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'user_id',
            'customer_id',
            'customer_name',
            'price',
            'status',
            'date_from',
            'date_to',
        ]);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'reservation_status' => null,
            'date_from' => null,
            'date_to' => null,
        ], $filters);

        $builder->when($filters['search'] == '', function ($query) use ($filters) {
            $query->where('date_from', '>=', $filters['date_from'])
                ->where('date_to', '<=', $filters['date_to'])
                ->where('status', 'like', '%' . $filters['reservation_status'] . '%');
        });

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query
                ->orWhere('customer_name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('id', 'like', '%' . $filters['search'] . '%')
                ->where('date_from', '>=', $filters['date_from'])
                ->where('date_to', '<=', $filters['date_to'])
                ->where('status', 'like', '%' . $filters['reservation_status'] . '%');
        });
    }
}
