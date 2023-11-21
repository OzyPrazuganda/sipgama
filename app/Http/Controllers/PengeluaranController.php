<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    public function index()
    {
        return view('pengeluaran.index', [
            'title' => 'pengeluaran',
            'pengeluaran' => Pengeluaran::all(['*'])
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required'
        ]);

        if (Pengeluaran::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('pengeluaran');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required'
        ]);

        if (Pengeluaran::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('pengeluaran');
    }

    public function drop($id)
    {
        if (DB::table('pengeluaran')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('pengeluaran');
    }
}
