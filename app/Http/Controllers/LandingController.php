<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $rumah = Rumah::count();
        $warga = User::count();
        $huni = Rumah::where('status', 'huni')->count();

        return view('landing.index', [
            'rumah' => $rumah,
            'warga' => $warga,
            'huni' => $huni
        ]);
    }
}
