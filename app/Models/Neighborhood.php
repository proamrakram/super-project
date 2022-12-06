<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name',
        'status',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class, 'neighborhood_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'city_id',
            'name',
            'status',
        ]);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'status' => null,
            'city_id' => null
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query->where('status', $filters['status'])
                ->orWhere('name', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] != '' && ($filters['status'] != null ||  $filters['city_id'] != null), function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->where('status', $filters['status'])
                ->where('status', $filters['city_id']);
        });

        $builder->when($filters['search'] == '' && $filters['status'] != null, function ($query) use ($filters) {
            $query->where('status', $filters['status']);
        });

        $builder->when($filters['search'] == '' && $filters['city_id'] != null, function ($query) use ($filters) {
            $query->where('city_id', $filters['city_id']);
        });
    }
}
