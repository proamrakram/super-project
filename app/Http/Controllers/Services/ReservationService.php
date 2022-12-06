<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationService extends Controller
{
    public function update($reservation, $data)
    {
        $reservation->update([
            'customer_name' => $data['customer_name'],
            'price' => $data['price'],
            'date_from' => $data['date_from'],
            'date_to' => $data['date_to'],
        ]);

        return true;
    }
}
