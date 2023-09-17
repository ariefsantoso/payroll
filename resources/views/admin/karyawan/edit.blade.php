@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">{{ ($title) }}</h6>
        
    </div>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div id="form-container">
            
            <div class="mb-3 row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" value="{{ $karyawan->nik }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $karyawan->nama }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ $karyawan->tempat_lahir }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ $karyawan->tanggal_lahir }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                        @if ($karyawan->jenis_kelamin == 'L')
                            {{ $cetak = "Laki - Laki"; }}
                        @elseif($karyawan->jenis_kelamin == 'P')
                            {{ $cetak = "Perempuan" }}
                        @endif
                        <option value="{{ $karyawan->jenis_kelamin }}" disabled selected>{{ $cetak }}</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jabatan" id="jabatan">
                        <option value="{{ $karyawan->jabatan }}" disabled selected>{{ $karyawan->jabatan }}</option>
                        <option value="Staff">Staff</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Manager">Manager</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status Karyawan</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                        <option value="{{ $karyawan->status }}" disabled selected>{{ $karyawan->status }}</option>
                        <option value="Harian Lepas">Harian Lepas</option>
                        <option value="Kontrak">Kontrak</option>
                        <option value="Karyawan Tetap">Karyawan Tetap</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gaji_pokok" class="col-sm-2 col-form-label">Gaji Pokok</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Masukkan Gaji Pokok" value="{{ $karyawan->gaji_pokok }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tunjangan" class="col-sm-2 col-form-label">Tunjangan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="tunjangan" id="tunjangan" placeholder="Masukkan Tunjangan" value="{{ $karyawan->tunjangan }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="Masukkan Tanggal Masuk" value="{{ $karyawan->tanggal_masuk }}">
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-auto">
           
            {{-- <button type="submit" class="btn btn-primary mb-3">Insert Barang</button> --}}
            <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-primary mb-3">
            </div>
        </div>
        <br>
        {{-- <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Insert Barang</button>
        </div>   --}}
    </form>
    <br>
</div>

@endsection