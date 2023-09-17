@extends('layouts.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-0">{{ ($title) }}</h6>
        <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="my-3 col-12 col-sm-8 col-md-5">
                    <form action="" method="get">                    
                        <div class="input-group mb-3">
                            {{-- <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Input Kode Transaksi" name="keywoard" value="{{ request('search') }}">
                            <button type="submit" class="input-group-text btn btn-primary">Search</button> --}}
                            {{-- <a href="/absensi/cuti/create" class="btn btn-primary m-1">Tambah Data </a> --}}
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
                        <th scope="col">Nik</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>

                    </tr>
                </thead>
                <tbody id="body">
                </tbody>
            </table>
        </div>
      

        <div class=" my-5 d-flex justify-content-center">
            {{-- {{ $karyawan->links()}} --}}
        </div>

    </div>
</div>

<script>

    $.ajax({
    url: "http://localhost:8000/api/absensi",
    type: 'GET',
    success: function(response) {
        let no = 1;
        // console.log(response);
        $.each(response, function (index, value) {
            // console.log(value)
            $('#body').append(`<tr> 
                        <td>`+ no++ +`</td> 
                        <td>`+ value.nik +`</td> 
                        <td>`+ value.tanggal +`</td>
                        <td>`+ value.karyawan.nama +`</td>
                        <td>`+ value.keterangan +`</td>                              
                       
                    </tr>`)
        });
    }
});
</script>
@endsection