<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Semester;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        $semester = Semester::all();
        $kelas = Kelas::with('guru', 'semester')->get();
        return view('backend.bk.kelas', compact('guru', 'semester', 'kelas'));
    }
    public function insertKelas(Request $request)
    {
        $this->validate($request, [
            'id_guru' => 'required',
            'nama_kelas' => 'required',
            'id_semester' => 'required',
            'ruangan' => 'required'
        ]);
        try {
            $data = new Kelas();
            $data->id_guru = $request->id_guru;
            $data->nama_kelas = $request->nama_kelas;
            $data->id_semester = $request->id_semester;
            $data->ruangan = $request->ruangan;
            $data->save();
            return redirect('datakelas')->with(['msg' => 'Data Berhasil Disimpan', 'type' => 'success']);
        } catch (\Exception $e) {
        }
    }
    public function updateKelas(Request $request, $id)
    {
        $this->validate($request, [
            'id_guru' => 'required',
            'nama_kelas' => 'required',
            'id_semester' => 'required',
            'ruangan' => 'required'
        ]);
        try {
            $data = Kelas::find($id);
            $data->id_guru = $request->id_guru;
            $data->nama_kelas = $request->nama_kelas;
            $data->id_semester = $request->id_semester;
            $data->ruangan = $request->ruangan;
            $data->save();
            return redirect('datakelas')->with(['msg' => 'Data Berhasil Diubah', 'type' => 'success']);
        } catch (\Exception $e) {
        }
    }
}
