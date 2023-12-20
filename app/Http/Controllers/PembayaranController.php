<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('pembayaran.index', [
            'title' => 'Pembayaran Iuran',
            'pembayaran' => Pembayaran::where('rumah_id', auth()->user()->rumah->id)->get(),
            // 'rumah' => Rumah::all(['*']),
            'metode_pembayaran' => MetodePembayaran::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rumah_id' => 'required',
            'bulan' => 'required|in:1,3,6,9',
            'metode_pembayaran_id' => 'required',
            'bukti_pembayaran' => 'required|image|file|max:1024',
            'total_bayar' => 'required',
            'status' => 'required|in:validasi,valid,invalid'
        ]);

        if ($request->file('bukti_pembayaran')) {
            if ($request->oldfile) {
                Storage::delete($request->oldfile);
            }
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
        }

        if (Pembayaran::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('/pembayaran');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'rumah_id' => 'required',
            'bulan' => 'required|in:1,3,6,9',
            'metode_pembayaran_id' => 'required',
            'bukti_pembayaran' => 'nullable|image|file|max:1024',
            'total_bayar' => 'required',
            'status' => 'required|in:validasi,valid,invalid'
        ]);

        if ($request->file('bukti_pembayaran')) {
            if ($request->oldfile) {
                Storage::delete($request->oldfile);
            }
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
        }

        if (Pembayaran::where('id', $request->id)->update($validatedData)) {
            Alert::success('Berhasil');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/pembayaran');
    }


    public function drop($id)
    {
        if (DB::table('pembayaran_iuran')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('pembayaran');
    }
}
