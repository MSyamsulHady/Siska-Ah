<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Ramsey\Uuid\Nonstandard\Uuid;

use function PHPSTORM_META\type;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('backend.data_guru.index', compact('guru'));
    }
    public function tambah_guru(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'tlp' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
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
            if ($request->hasFile('foto')) {
                $ext = $request->file('foto')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('foto')->move("Foto_guru/", $name);
            }
            $data->foto = $name;
            $data->save();
            return redirect('dataguru')->with(['msg' => 'Data Berhasil Ditambah', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect('dataguru')->with(['msg' => $e . 'Data Gagal Ditambah ', 'type' => 'error']);
        }
    }
    public function edit_guru(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'tlp' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'pend_terakhir' => 'required'
        ]);
        try {
            $data = Guru::find($id);

            if ($request->hasFile('foto')) {
                $file = public_path('Foto_guru/' . $data->foto);
                if (file_exists($file)) {
                    unlink($file);
                }
                $ext = $request->file('foto')->getClientOriginalExtension();
                $name = Uuid::uuid4() . "." . $ext;
                $request->file('foto')->move("Foto_guru/", $name);
                $data->foto = $name;
            }
            $data->nuptk = $request->nuptk;
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->tlp = $request->tlp;
            $data->gender = $request->gender;
            $data->pend_terakhir = $request->pend_terakhir;
            $data->save();
            return redirect('dataguru')->with(['msg' => 'Data Berhasil Di rubah', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect('dataguru')->with(['msg' => $e . 'Data Gagal Di rubah ', 'type' => 'error']);
        }
    }
}
