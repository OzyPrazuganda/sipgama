<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
{
    public function index()
    {
        // join table
        $pemasukan = Pemasukan::all(['*']);
        $pembayaran = Pembayaran::where('status', 'valid')
            ->select('created_at', 'total_bayar as jumlah')
            ->get();
        $rekap = $pembayaran->concat($pemasukan);

        // for view
        $totalPemasukan = $rekap->sum('jumlah');
        $totalPengeluaran = Pengeluaran::sum('jumlah');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;
        $totalPemasukanBulanIni = Pemasukan::whereBetween('tanggal', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])->sum('jumlah');
        $totalPemasukanBulanKemarin = Pemasukan::whereBetween('tanggal', [now()->startOfMonth(), now()->subMonth()->endOfMonth()])->sum('jumlah');

        $persentasePertumbuhan = 0;

        if ($totalPemasukanBulanKemarin > 0) {
            $persentasePertumbuhan = (($totalPemasukanBulanIni - $totalPemasukanBulanKemarin) / $totalPemasukanBulanKemarin) * 100;
        }

        return view('rekapitulasi.index', [
            'title' => 'Rekapitulasi Keuangan',
            'pemasukan' => $pemasukan,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'saldoAkhir' => $saldoAkhir,
            'persentasePertumbuhan' => $persentasePertumbuhan,
            'pembayaran' => $pembayaran,
            'rekap' => $rekap
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'nullable'
        ]);

        if (Pemasukan::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('rekapitulasi');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'nullable'
        ]);

        if (Pemasukan::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('rekapitulasi');
    }

    public function drop($id)
    {
        if (DB::table('pemasukan')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('rekapitulasi');
    }
}
