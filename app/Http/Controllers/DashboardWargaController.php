<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pembayaran;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Charts\LineChart;

class DashboardWargaController extends Controller
{
    public function index(LineChart $chart)
    {
        return view('dashboard.dashboard_warga', [
            'permohonan_surat' => Permohonan::all(['*']),
            'pembayaran' => Pembayaran::all(['*']),
            'WargaLineChart' => $chart->build()
        ]);
    }
}
