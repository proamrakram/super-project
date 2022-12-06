<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NeighborhoodService extends Controller
{
    public function update($neighborhood, $data)
    {
        $neighborhood->update([
            'city_id' => $data['city_id'],
            'name' => $data['neighborhood_name']
        ]);
    }
}
