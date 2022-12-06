<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user) {
            return redirect()->route('panel.home');
        }

        return redirect()->route('login');
    }
}
