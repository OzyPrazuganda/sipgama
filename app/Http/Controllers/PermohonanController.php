<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PermohonanController extends Controller
{
    public function index()
    {
        return view('permohonan_surat.permohonan_index', [
            'title' => 'Permohonan Surat',
            'permohonan_surat' => Permohonan::where('users_id', auth()->user()->id)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis' => 'required|in:Surat Pengantar Pembuatan SKCK,Surat Pengantar Mengurus KTP,Surat Pengantar Domisili,Surat Pengantar Kematian,Surat Pengantar Penelitian',
            'status' => 'required|in:pengajuan,validasi,proses,selesai,batal',
            'users_id' => 'required'
        ]);

        if (Permohonan::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('/permohonan');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'jenis' => 'required|unique:permohonan_surat,jenis,' . $request->id,
            'status' => 'required',
            'users_id' => 'required'
        ]);

        if (Permohonan::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/permohonan');
    }

    public function drop($id)
    {
        if (DB::table('permohonan_surat')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/permohonan');
    }
}
