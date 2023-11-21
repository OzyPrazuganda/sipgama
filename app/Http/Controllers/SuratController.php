<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuratController extends Controller
{
    public function index()
    {
        return view('surat.index', [
            'title' => 'Permohonan Surat',
            'permohonan_surat' => Permohonan::all(),
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'nullable|unique:permohonan_surat,nomor_surat',
            'jenis' => 'required',
            'status' => 'required',
            'users_id' => 'required'
        ]);

        if (Permohonan::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('/surat');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'jenis' => 'required',
            'status' => 'required',
            'users_id' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048'
        ]);

        $existingNomorSurat = Permohonan::where('id', $request->id)->value('nomor_surat');

        if ($request->has('nomor_surat') && $request->nomor_surat !== $existingNomorSurat) {
            // Cek apakah nomor surat sudah ada di database
            $existingNomorSuratCount = Permohonan::where('nomor_surat', $request->nomor_surat)->count();

            if ($existingNomorSuratCount > 0) {
                // Nomor surat sudah ada, tampilkan pesan kesalahan
                Alert::error('Error', 'Nomor surat sudah ada.');
                return redirect()->back()->withInput();
            }

            $uniqueNomorSuratRule = 'nullable|unique:permohonan_surat,nomor_surat';
            $validatedData['nomor_surat'] = $request->validate([
                'nomor_surat' => $uniqueNomorSuratRule
            ])['nomor_surat'];
        }

        if ($request->file('file')) {
            if ($request->oldfile) {
                Storage::delete($request->oldfile);
            }
            $validatedData['file'] = $request->file('file')->store('files');
        }

        if (Permohonan::where('id', $request->id)->update($validatedData)) {
            Alert::success('Berhasil!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/surat');
    }


    // public function drop($id)
    // {
    //     $data = DB::table('permohonan_surat')->where('id', $id)->first(); // Fetch the data by ID

    //     if (!$data) {
    //         Alert::error('Error', 'Data not found.');
    //         return redirect('/surat');
    //     }

    //     if ($data->file) {
    //         Storage::delete($data->file);
    //     }

    //     if (DB::table('permohonan_surat')->where('id', $id)->delete()) {
    //         Alert::success('Data Dropped!');
    //     } else {
    //         Alert::error('Error', 'Something went wrong.');
    //     }

    //     return redirect('surat');
    // }
}
