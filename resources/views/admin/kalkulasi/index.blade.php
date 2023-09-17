@extends('layouts.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-0">{{ ($title) }}</h6>
        <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="my-3 col-12 col-sm-8 col-md-5">
                    <form action="" method="get">                    
                        <div class="input-group mb-3">
                           
                            
                        </div>
                    </form>
                </div>
            
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
   
    
    <form action="{{ route('kalkulasi') }}" method="POST">
        @csrf
        <div id="form-container">
            <div class="mb-3 row">
                <label for="bulan" class="col-sm-2 col-form-label">Pilih Bulan</label>
                <div class="col-sm-10">
                    <select class="form-select" id="bulan" aria-label="Default select example" name="bulan" id="bulan">
                        @foreach ($bulan as $key => $item)
                                <option value="{{ $item }}">{{ $namabulan[$key] }}</option>
                        @endforeach    
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bulan" class="col-sm-2 col-form-label">Jumlah Sakit</label>
                <div class="col-sm-10" id="jumlahSakit">
                </div>
            </div>
           
           
        
        <br>
        <div class="col-auto">
           
            {{-- <button type="submit" class="btn btn-primary mb-3">Insert Barang</button> --}}
            <div class="mb-3">
                <input type="submit" value="Kalkulasi" class="btn btn-primary mb-3">
            </div>
        </div>
        <br>
        {{-- <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Insert Barang</button>
        </div>   --}}
    </form>

    </div>
</div>
<script>
var value = $('#bulan').val();
$.ajax({
    url: "http://localhost:8000/api/jumlah-sakit-karyawan?bulan="+value,
    type: 'GET',
    success: function(response) {
        
        $.each(response, function (index, value) {
            $('#jumlahSakit').append(
                `<input type="text" name="sakit[`+value.nik+`]" value="`+value.absen_count+`" class="form-control">`
            );
        });
    }
});

$('#bulan').on('change', function() {
  var value = $(this).val();
    $('#jumlahSakit').html('');
  $.ajax({
    url: "http://localhost:8000/api/jumlah-sakit-karyawan?bulan="+value,
    type: 'GET',
    success: function(response) {
        $.each(response, function (index, value) {
            $('#jumlahSakit').append(
                `<input type="text" name="sakit[`+value.nik+`]" value="`+value.absen_count+`" class="form-control">`
            );
        });
    }
});

});

</script>
@endsection