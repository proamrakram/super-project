<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'employer_id',
        'employer_name',
        'nationality_id',
        'NID',
        'city_id',
        'building_number',
        'street_name',
        'neighborhood_name',
        'zip_code',
        'addtional_number',
        'unit_number',
        'support_eskan',
        'employee_type',
        'status',
        'is_buy',
        'who_add',
        'who_edit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'reservation_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'customer_status' => null,
            'city_id' => null,
            'employee_type' => null
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query
                ->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('phone', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] == '' && $filters['customer_status'] != null, function ($query) use ($filters) {
            $query->where('status', $filters['customer_status']);
        });

        $builder->when($filters['search'] == '' && $filters['employee_type'] != null, function ($query) use ($filters) {
            $query->where('employee_type', $filters['employee_type']);
        });

        $builder->when($filters['search'] == '' && $filters['city_id'] != null, function ($query) use ($filters) {
            $query->where('city_id', $filters['city_id']);
        });
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'user_id',
            'name',
            'phone',
            'email',
            'employer_id',
            'employer_name',
            'nationality_id',
            'NID',
            'city_id',
            'building_number',
            'street_name',
            'neighborhood_name',
            'zip_code',
            'addtional_number',
            'unit_number',
            'support_eskan',
            'employee_type',
            'status',
            'is_buy',
            'who_add',
            'who_edit',
        ]);
    }
}
