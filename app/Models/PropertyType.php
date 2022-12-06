<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class, 'property_type_id', 'id');
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
        ]);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'property_type_id', 'id');
    }
}
