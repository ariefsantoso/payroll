@extends('layouts.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-0">{{ ($title) }}</h6>
        <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="my-3 col-12 col-sm-8 col-md-5">
                    <form action="" method="get">                    
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Input Kode Transaksi" name="keywoard" value="{{ request('search') }}">
                            <button type="submit" class="input-group-text btn btn-primary">Search</button>
                            <a href="/karyawan/create" class="btn btn-primary m-1">Tambah Data </a>
                        </div>
                    </form>
                </div>
            
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

       
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                        <th scope="col" width="5%">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        {{-- <th scope="col">Total Items</th> --}}
                        {{-- <th scope="col">Harga</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $datakaryawan)
                    <tr>
                        {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ($datakaryawan->nama) }}</td>
                        <td>{{ ($datakaryawan->nik) }}</td>
                        <td>{{ ($datakaryawan->tempat_lahir) }}</td>                            
                        <td>{{ ($datakaryawan->tanggal_lahir) }}</td>                            
                        
                        <td>
                        
                            {{-- <a class="btn btn-sm btn-primary" href="/print/{{ $datakaryawan->kode_transaksi }}" target="_blank">Print</a> --}}
                            <a class="btn btn-sm btn-warning" href="/karyawan/{{ $datakaryawan->id }}/edit">Edit</a>
                            <form action="{{ route('karyawan.destroy', $datakaryawan->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      

        <div class=" my-5 d-flex justify-content-center">
            {{-- {{ $karyawan->links()}} --}}
        </div>

    </div>
</div>
@endsection