@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">{{ ($title) }}</h6>
        
    </div>

    <form action="{{ route('absen.update', $absen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div id="form-container">
            
            
            {{-- <div class="mb-3 row">
                <label for="nik" class="col-sm-2 col-form-label">Pilih Karyawan</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="nik" id="nik">
                        <option value="{{ $absen->nik }}" disabled selected>{{ $absen->karyawan->nama }}</option>
                        @foreach ($karyawan as $item)
                        <option value="{{ $item->nik }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
            <div class="mb-3 row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan Tanggal Masuk" value="{{ $absen->nik }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="keterangan" id="keterangan">
                        <option value="{{ $absen->keterangan }}" disabled selected>{{ $absen->keterangan }}</option>
                        <option value="Cuti Resmi">Cuti Resmi</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Alpha">Alpha</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal Masuk" value="{{ $absen->tanggal }}">
                </div>
            </div>
            <input type="hidden" class="form-control" name="bulan" id="bulan" placeholder="Masukkan bulan" value="{{ $absen->bulan }}">
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