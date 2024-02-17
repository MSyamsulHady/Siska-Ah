<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return view('backend.data_guru.index');
    }
    public function tambah_guru(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'tlp' => 'required',
            'gender' => 'required',
            'pend_terakhir' => 'required'
        ]);
        try {
            $data = new Guru();
            $data->nuptk = $request->nuptk;
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->tlp = $request->tlp;
            $data->gender = $request->gender;
            $data->pend_terakhir = $request->pend_terakhir;
            $data->save();
            return redirect('');
        } catch (\Exception $e) {
        }
    }
}
