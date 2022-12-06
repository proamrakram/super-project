<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'code'
    ];

    public function branches()
    {
        return $this->hasMany(Branch::class, 'city_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'city_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'city_id', 'id');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'city_id', 'id');
    }

    public function neighborhoods()
    {
        return $this->hasMany(Neighborhood::class, 'city_id', 'id');
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'code',
            'status'
        ]);
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
}
