@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">{{ ($title) }}</h6>
        
    </div>

    <form action="{{ route('gaji.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div id="form-container">
            
            <div class="mb-3 row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" value="{{ $karyawan->nik }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $karyawan->nama }}" readonly>
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