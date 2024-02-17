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
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'tlp' => 'required',
            'gender' => 'required',
            'pend_terakhir' => 'required'
        ]);
        try {
            $data = new Guru();
            $data->nip = $request->nip;
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->tlp = $request->tlp;
            $data->gender = $request->gender;
            $data->pend_terakhir = $request->pend_terakhir;
        } catch (\Exception $e) {
        }
    }
}
