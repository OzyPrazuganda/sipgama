<?php

namespace App\Http\Controllers;

use App\Models\TipeRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Storetipe_rumahRequest;
use App\Http\Requests\Updatetipe_rumahRequest;
use Illuminate\Contracts\Support\ValidatedData;

class TipeRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tipe_rumah.tipe_rumah_index', [
            'title' => 'Tipe Rumah',
            'tipe_rumah' => TipeRumah::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_tipe' => 'required',
            'keterangan' => 'nullable',
            'biaya' => 'required'
        ]);

        if (TipeRumah::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('/tipe_rumah');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_tipe' => 'required|unique:tipe_rumah,nomor_tipe,' . $request->id,
            'keterangan' => 'nullable',
            'biaya' => 'required'
        ]);

        if (TipeRumah::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/tipe_rumah');
    }

    public function drop($id)
    {
        if (DB::table('tipe_rumah')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/tipe_rumah');
    }
}
