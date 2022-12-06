<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'status',
        'city_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_branches', 'branch_id', 'user_id', 'id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'branch_id', 'id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'branch_id', 'id');
    }

    public function getCityNameAttribute()
    {
        $city = $this->city;
        if ($city) {
            return $this->city->name;
        }
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'status' => null,
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query->where('status', $filters['status'])
                ->orWhere('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('code', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] != '' && $filters['status'] != null, function ($query) use ($filters) {
            $query->where('status', $filters['status'])
                ->orWhere('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('code', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] == '' && $filters['status'] != null, function ($query) use ($filters) {
            $query->where('status', $filters['status']);
        });
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'code',
            'status',
            'city_id',
        ]);
    }
}
