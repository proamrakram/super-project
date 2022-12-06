<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Mediator;
use Illuminate\Http\Request;

class MediatorService extends Controller
{
    public function store($data)
    {
        $mediator = Mediator::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'type' => $data['type']
        ]);

        return $mediator;
    }

    public function update($mediator, $data)
    {
        $mediator->update([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'type' => $data['type']
        ]);
        return true;
    }
}
