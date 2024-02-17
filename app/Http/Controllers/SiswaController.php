<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('backend.bk.data_siswa');
    }
    public function tambahSiswa(Request $request)
    {
        $this->validate($request, []);
    }
}
