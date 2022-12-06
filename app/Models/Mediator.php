<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediator extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'user_id',
            'name',
            'phone_number',
            'type',
            'status',
        ]);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'mediator_status' => null,
            'mediator_type' => null

        ], $filters);


        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('phone_number', 'like', '%' . $filters['search'] . '%')
                ->orWhere('id', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] == '' && $filters['mediator_status'] != null, function ($query) use ($filters) {
            $query->where('status', $filters['mediator_status']);
        });

        $builder->when($filters['search'] == '' && $filters['mediator_type'] != null, function ($query) use ($filters) {
            $query->where('type', $filters['mediator_type']);
        });
    }
}
