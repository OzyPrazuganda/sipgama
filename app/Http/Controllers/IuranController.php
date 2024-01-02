<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rumah;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class IuranController extends Controller
{
    public function index()
    {
        return view('daftar_iuran.index', [
            'title' => 'Daftar Iuran',
            // 'pembayaran' => Pembayaran::all(['*']),
            'pembayaran' => Pembayaran::latest()->get(),
            'rumah' => Rumah::all(['*']),
            'warga' => User::all(),
            'metode_pembayaran' => MetodePembayaran::all(['*']),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rumah_id' => 'required',
            'bulan' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12',
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

        if (Pembayaran::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }
        return redirect('/daftar_iuran');
    }

    public function update(Request $request)
    {
        // dd($request->request);
        $validatedData = $request->validate([
            // 'rumah_id' => 'required',
            // 'warga_id' => 'required',
            'bulan' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'metode_pembayaran_id' => 'required',
            'bukti_pembayaran' => 'nullable|image|file|max:1024',
            'total_bayar' => 'required',
            'status' => 'required|in:validasi,valid,invalid'
        ]);

        $bayar_berikut = null;

        if ($request->status) {
            $pembayaran = Pembayaran::where('id', $request->id)->first();
            $created_at = $pembayaran->created_at;
            $bayar_berikut = date('Y-m-d', strtotime("+" . $request->bulan . " months", strtotime($created_at)));
        }

        $validatedData['bulan_berikut'] = $bayar_berikut;

        if ($request->file('bukti_pembayaran')) {
            if ($request->oldfile) {
                Storage::delete($request->oldfile);
            }
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
        }

        if (Pembayaran::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/daftar_iuran');
    }

    // public function drop($id)
    // {
    //     $data = DB::table('pembayaran_iuran')->where('id', $id)->first(['*']); // Fetch the data by ID

    //     if (!$data) {
    //         Alert::error('Error', 'Data not found.');
    //         return redirect('daftar_iuran');
    //     }

    //     if ($data->bukti_pembayaran) {
    //         Storage::delete($data->bukti_pembayaran);
    //     }

    //     if (DB::table('pembayaran_iuran')->where('id', $id)->delete()) {
    //         Alert::success('Data Dropped!');
    //     } else {
    //         Alert::error('Error', 'Something went wrong.');
    //     }

    //     return redirect('daftar_iuran');
    // }
}
