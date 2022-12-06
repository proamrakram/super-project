<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityService extends Controller
{
    public function update($city, $data)
    {
        $city->update([
            'name' => $data['city_name'],
            'code' => $data['city_code'],
        ]);
    }
}
