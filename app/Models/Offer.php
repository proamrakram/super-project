<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'neighborhood_id',
        'offer_type_id',
        'property_type_id',
        'property_id',
        'property_status_id',
        'price_type_id',
        'street_id',
        'direction_id',
        'land_type_id',
        'branch_id',
        'user_id',
        'who_edit',
        'who_cancel',
        'land_number',
        'block_number',
        'mediators_ids',
        'booking_ids',
        'full_price',
    ];

    protected $casts = [
        'mediators_ids' => 'array',
        'booking_ids' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class, 'neighborhood_id', 'id');
    }

    public function offerType()
    {
        return $this->belongsTo(OfferType::class, 'offer_type_id', 'id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }

    // public function property()
    // {
    //     return $this->belongsTo(Property::class, 'property_id', 'id');
    // }

    public function propertyStatus()
    {
        return $this->belongsTo(PropertyStatus::class, 'property_status_id', 'id');
    }

    public function priceType()
    {
        return $this->belongsTo(PriceType::class, 'price_type_id', 'id');
    }

    public function street()
    {
        return $this->belongsTo(Street::class, 'street_id', 'id');
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class, 'direction_id', 'id');
    }

    public function landType()
    {
        return $this->belongsTo(LandType::class, 'land_type_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
