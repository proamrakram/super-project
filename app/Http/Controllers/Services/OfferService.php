<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferService extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store()
    {
        $this->request->validate([
            'city_id' => ['required', 'exists:cities,id'],
            'neighborhood_id' => ['required', 'exists:neighborhoods,id'],
            'offer_type_id' => ['required', 'exists:offer_types,id'],
            'property_type_id' => ['required', 'exists:property_types,id'],
            'property_id' => ['required', 'exists:propertys,id'],
            'property_status_id' => ['required', 'exists:property_statuses,id'],
            'price_type_id' => ['required', 'exists:price_types,id'],
            'street_id' => ['required', 'exists:streets,id'],
            'direction_id' => ['required', 'exists:directions,id'],
            'land_type_id' => ['required', 'exists:land_types,id'],
            'branch_id' => ['required', 'exists:branches,id'],
            'user_id' => ['required', 'exists:users,id'],
            'who_edit' => ['required', 'exists:users,id'],
            'who_cancel' => ['required', 'exists:users,id'],
            'land_number' => ['required', 'string'],
            'block_number' => ['required', 'string'],
            'mediators_ids' => ['required', 'array'],
            'booking_ids' => ['required', 'array'],
            'full_price' => ['required', 'string'],
        ]);


        $offer = Offer::create([
            'city_id' => $this->request->city_id,
            'neighborhood_id' => $this->request->neighborhood_id,
            'offer_type_id' => $this->request->offer_type_id,
            'property_type_id' => $this->request->property_type_id,
            'property_id' => $this->request->property_id,
            'property_status_id' => $this->request->property_status_id,
            'price_type_id' => $this->request->price_type_id,
            'street_id' => $this->request->street_id,
            'direction_id' => $this->request->direction_id,
            'land_type_id' => $this->request->land_type_id,
            'branch_id' => $this->request->branch_id,
            'user_id' => $this->request->user_id,
            'who_edit' => $this->request->who_edit,
            'who_cancel' => $this->request->who_cancel,
            'land_number' => $this->request->land_number,
            'block_number' => $this->request->block_number,
            'mediators_ids' => $this->request->mediators_ids,
            'booking_ids' => $this->request->booking_ids,
            'full_price' => $this->request->full_price,
        ]);
    }
}
