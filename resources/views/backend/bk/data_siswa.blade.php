@extends('layout.layout_backend.app')
@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold ">Data Siswa</h2>
                    </div>
                    {{-- <div class="ml-md-auto py-2 py-md-0">
                        <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                        <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
                    </div> --}}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">
                                Add
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>NIS</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Orang Tua</th>
                                        <th>No HP</th>
                                        <th>Jurusan</th>
                                        <th>Foto</th>
                                        <th>#Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $sw)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sw->nisn }}</td>
                                            <td>{{ $sw->nis }}</td>
                                            <td>{{ $sw->nik }}</td>
                                            <td>{{ $sw->nama }}</td>
                                            <td>{{ $sw->alamat }}</td>
                                            <td>{{ $sw->gender }}</td>
                                            <td>{{ $sw->tgl_lahir }}</td>
                                            <td>{{ $sw->orang_tua }}</td>
                                            <td>{{ $sw->nohp_ortu }}</td>
                                            <td>{{ $sw->jurusan }}</td>
                                            <td>{{ $sw->foto }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#ModalEdit{{ $sw->id_siswa }}" title=""
                                                        class="btn btn-link btn-primary btn-lg" data-original-title="Edit ">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Modal Add -->
                            <div class="modal fade bd-example-modal-lg" id="ModalAdd" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Input Data Siswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('insert_siswa') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="nisn">NISN</label>
                                                            <input type="text" class="form-control" id="nisn"
                                                                name="nisn" placeholder="NISN">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama" placeholder="Nama Lengkap">
                                                        </div>
                                                        <div class="form-check">
                                                            <label>Jenis Kelamin</label><br />
                                                            <label class="form-radio-label">
                                                                <input class="form-radio-input" type="radio"
                                                                    name="gender" value="laki-laki">
                                                                <span class="form-radio-sign">Laki-Laki</span>
                                                            </label>
                                                            <label class="form-radio-label ml-3">
                                                                <input class="form-radio-input" type="radio"
                                                                    name="gender" value="perempuan">
                                                                <span class="form-radio-sign">Perempuan</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <label for="orang_tua">Nama Orang Tua / Wali</label>
                                                            <input type="text" class="form-control" name="orang_tua"
                                                                placeholder="Nama Orang tua / wali">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Foto</label>
                                                            <input type="file" class="form-control-file" name="foto">
                                                        </div>
                                                    </div>
                                                    <div class="col ">
                                                        <div class="form-group">
                                                            <label for="nis">NIS</label>
                                                            <input type="text" class="form-control" id="nis"
                                                                name="nis" placeholder="NIS">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_kk">NIK</label>
                                                            <input type="text" class="form-control" name="nik"
                                                                placeholder="NIK">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" name="tgl_lahit">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Jurusan</label>
                                                            <select class="form-control" name="jurusan">
                                                                <option selected> -- Pilih -- </option>
                                                                <option>RPL</option>
                                                                <option>Perhotelan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nohp_ortu">No HP</label>
                                                            <input type="text" class="form-control" id="nohp_ortu"
                                                                name="nohp_ortu" placeholder="No HP">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="">Alamat</label>
                                                            <textarea name="alamat" id="" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
