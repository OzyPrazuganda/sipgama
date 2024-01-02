<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\TipeRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RumahController extends Controller
{
    public function index()
    {
        return view('rumah.rumah_index', [
            'title' => "Rumah",
            'rumah' => Rumah::all(),
            'tipe_rumah' => TipeRumah::all()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nomor_rumah' => 'required',
            'blok' => 'required',
            'status' => 'required|in:valid,invalid',
            'tipe_rumah_id' => 'required'
        ]);

        if (Rumah::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('/rumah');
    }

    public function update(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nomor_rumah' => 'required|unique:rumah,nomor_rumah,' . $request->id,
            'blok' => 'required',
            'status' => 'required',
            'tipe_rumah_id' => 'required',
        ]);

        // dd($validatedData);

        if (Rumah::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/rumah');
    }

    public function drop($id)
    {
        if (DB::table('rumah')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/rumah');
    }
}
