<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semester = Semester::all();
        return view('backend.bk.semester', compact('semester'));
    }
    public function insertSemester(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'nama_semester' => 'required',
            'status' => 'required'
        ]);
        try {
            $data = new Semester();
            $data->nama_semester = $request->semester;
            $data->status = $request->status;
            $data->save();
            return redirect('semester')->with(['msg' => 'Data Berhasil Disimpan', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect('semester')->with(['msg' => 'Data Gagal Disimpan', 'type' => 'error']);
            print($e);
        }
    }
}
