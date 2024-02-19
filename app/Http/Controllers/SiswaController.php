<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('backend.bk.data_siswa', compact('siswa'));
    }
    public function tambahSiswa(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nisn' => 'required',
            'nis' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'tanggal_lahir' => 'required',
            'orang_tua' => 'required',
            'jurusan' => 'required'

        ]);
        try {
            $data = new Siswa();
            $data->nisn = $request->nisn;
            $data->nis = $request->nis;
            $data->nik = $request->nik;
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->gender = $request->gender;
            $data->tanggal_lahir = $request->tgl_lahir;
            $data->orang_tua = $request->orang_tua;
            $data->nohp_ortu = $request->no_hp;
            $data->jurusan = $request->jurusan;
            if ($request->hasFile('foto')) {
                $ext = $request->file('foto')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('foto')->move("Foto_Siswa/", $name);
            }
            $data->foto = $name;
            $data->save();
            return redirect('datasiswa')->with(['msg' => 'Data Berhasil Ditambah', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect('datasiswa')->with(['msg' => 'Data  Gagal Ditambah', 'type' => 'error']);
        }
    }
}
