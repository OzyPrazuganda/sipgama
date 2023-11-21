<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class InventarisController extends Controller
{
    public function index()
    {
        return view('inventaris.inventaris_index', [
            'title' => 'Inventaris',
            'inventaris' => Inventaris::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required|in:rusak,hilang,ganti',
            'keterangan' => 'required'
        ]);

        if (Inventaris::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('inventaris');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|unique:inventaris,nama_barang,' . $request->id,
            'jumlah' => 'required',
            'kondisi' => 'required|in:rusak,hilang,ganti',
            'keterangan' => 'required'
        ]);

        if (Inventaris::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('inventaris');
    }

    public function drop($id)
    {
        if (DB::table('inventaris')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('inventaris');
    }
}
