@extends('layout.layout_backend.app')
@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold ">Kelas</h2>
                    </div>
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
                                        <th>pengajar</th>
                                        <th>Nama Kelas</th>
                                        <th>Semester</th>
                                        <th>Ruangan</th>
                                        <th>#Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        {{-- modal Add --}}
                        <div class="modal fade " id="ModalAdd" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Input Semester</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="form-group">
                                                        <label for="nama_semester">Kelas</label>
                                                        <input type="text"
                                                            class="form-control @error('nama_semester')  is-invalid
                                                            @enderror"
                                                            id="nama_semester" name="nama_semester"
                                                            placeholder="nama_semester">
                                                        @error('semester')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-check">
                                                        <label>Status</label><br />
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio" name="status"
                                                                value="Aktif">
                                                            <span class="form-radio-sign">Aktif</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="status"
                                                                value="Tidak Aktif">
                                                            <span class="form-radio-sign">Tidak Aktif</span>
                                                        </label>
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
                        {{-- end modal Add --}}

                        {{-- Modal Update --}}
                        @foreach ($semester as $smtr)
                            <div class="modal fade " id="ModalEdit{{ $smtr->id_semester }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Input Semester</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('update_semester', $smtr->id_semester) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="nama_semester">semester</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_semester')  is-invalid
                                                        @enderror"
                                                                id="nama_semester" name="nama_semester"
                                                                placeholder="nama_semester"
                                                                value="{{ $smtr->nama_semester }}">
                                                            @error('semester')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-check">
                                                            <label>Status</label><br />
                                                            <label class="form-radio-label">
                                                                <input class="form-radio-input" type="radio"
                                                                    name="status" value="Aktif"
                                                                    {{ $smtr->status == 'Aktif' ? 'checked' : '' }}>
                                                                <span class="form-radio-sign">Aktif</span>
                                                            </label>
                                                            <label class="form-radio-label ml-3">
                                                                <input class="form-radio-input" type="radio"
                                                                    name="status" value="Tidak Aktif"
                                                                    {{ $smtr->status == 'Tidak Aktif' ? 'checked' : '' }}>
                                                                <span class="form-radio-sign">Tidak Aktif</span>
                                                            </label>
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
                        @endforeach
                        Modal Update
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
