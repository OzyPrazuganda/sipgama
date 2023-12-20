<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        return view('metode_pembayaran.metode_pembayaran_index', [
            'title' => 'Metode Pembayaran',
            'metode_pembayaran' => MetodePembayaran::all(['*'])
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_pembayaran' => 'required',
            'nama' => 'required',
            'metode_pembayaran' => 'required|in:bri,bca,mandiri,dana,gopay,shopeepay,ovo,qris,ditempat'
        ]);

        if (MetodePembayaran::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('/metode_pembayaran');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_pembayaran' => 'required',
            'nama' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        if (MetodePembayaran::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('metode_pembayaran');
    }

    public function drop($id)
    {
        if (DB::table('metode_pembayaran')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/metode_pembayaran');
    }
}
