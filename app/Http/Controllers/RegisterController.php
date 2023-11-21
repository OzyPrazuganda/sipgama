<?php

namespace App\Http\Controllers;

use App\Imports\UserImports;
use App\Models\User;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'users' => User::all(),
            'rumah' => Rumah::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|max:16',
            'nik' => 'required|unique:users',
            'name' => 'required|max:255',
            'role' => 'required|in:admin,pimpinan,bendahara,warga',
            'no_telp' => 'required|max:12',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|in:islam,kristen,buddha,hindu,konghuchu',
            'pendidikan_terakhir' => 'required|in:SD,SMP,SMA,S1,S2,S3',
            'pekerjaan' => 'required|in:karyawan_swasta,petani,wiraswasta,pns,guru/dosem,pengemudi,tenaga_medis,nelayan,lainnya',
            'password' => 'required|min:5|max:255',
            'rumah_id' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if (User::create($validatedData)) {
            Alert::success('Data Added!');
        } else {
            Alert::error('Add data Error', 'Something went wrong.');
        }

        return redirect('/register');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|unique:users,nik,' . $request->id,
            'no_kk' => 'required',
            'name' => 'required',
            'role' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pendidikan_terakhir' => 'required',
            'pekerjaan' => 'required',
            'rumah_id' => 'required'
        ]);

        if (User::where('id', $request->id)->update($validatedData)) {
            Alert::success('Data Updated!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('/register');
    }

    public function import(Request $request)
    {
        if (Excel::import(new UserImports, $request->file('file'))) {
            Alert::success('Data Imported!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('register');
    }

    public function drop($id)
    {
        if (DB::table('users')->where('id', $id)->delete()) {
            Alert::success('Data Dropped!');
        } else {
            Alert::error('Error', 'Something went wrong.');
        }

        return redirect('register');
    }
}
