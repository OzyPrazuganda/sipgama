<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rumah;
use App\Charts\LineChart;
use App\Models\Pemasukan;
use App\Charts\RekapChart;
use App\Models\Inventaris;
use App\Models\Pembayaran;
use App\Models\Permohonan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index(RekapChart $pieChart, LineChart $chart)
    {
        // Join Table
        $pemasukan = Pemasukan::all(['*']);
        $pembayaran = Pembayaran::where('status', 'valid')
            ->select('created_at', 'total_bayar as jumlah')
            ->get();
        $rekap = $pembayaran->concat($pemasukan);

        // for view
        $totalPemasukan = $rekap->sum('jumlah');
        $totalPengeluaran = Pengeluaran::sum('jumlah');
        $users = User::count(['*']);
        $totalrumah = Rumah::count(['*']);
        $rumahvalid = Rumah::where('status', 'valid')->count();
        $rumahinvalid = Rumah::where('status', 'invalid')->count();
        $permohonan = Permohonan::where('status', 'pengajuan')->count();

        return view('dashboard.dashboard_admin', [
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'users' => $users,
            'total_rumah' => $totalrumah,
            'rumah_valid' => $rumahvalid,
            'rumah_invalid' => $rumahinvalid,
            'permohonan' => $permohonan,
            'inventaris' => Inventaris::all(['*']),
            'pieChart' => $pieChart->buildPieChart(),
            'lineChart' => $chart->build()
        ]);
    }
}
