@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">{{ ($title) }}</h6>
        
    </div>

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div id="form-container">
            
            <div class="mb-3 row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jabatan" id="jabatan">
                        <option value="" disabled selected>Pilih Jabatan</option>
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
                        <option value="" disabled selected>Pilih Status Karyawan</option>
                        <option value="Harian Lepas">Harian Lepas</option>
                        <option value="Kontrak">Kontrak</option>
                        <option value="Karyawan Tetap">Karyawan Tetap</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gaji_pokok" class="col-sm-2 col-form-label">Gaji Pokok</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Masukkan Gaji Pokok">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tunjangan" class="col-sm-2 col-form-label">Tunjangan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="tunjangan" id="tunjangan" placeholder="Masukkan Tunjangan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="Masukkan Tanggal Masuk">
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                generateKodeOtomatis(1); // Memanggil fungsi untuk mengisi kode transaksi pada form pertama
            });
            let formCounter = 1;

           
            function removeForm(button) {
                const formContainer = document.getElementById('form-container');
                formContainer.removeChild(button.parentNode);
            }

            function generateKodeOtomatis(formNumber) {
                $.ajax({
                    url: '/get_last_kode_pembelian', // Ubah sesuai dengan URL endpoint Anda
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            let lastKode = response.data.kode_transaksi;
                            let currentNumber = parseInt(lastKode.substr(12));
                            let nextNumber = currentNumber + 1;
                            var today = new Date();
                            var year = today.getFullYear().toString().substr(-2);
                            var month = ("0" + (today.getMonth()+1)).slice(-2);
                            var day = ("0" + today.getDate()).slice(-2)
                            let nextKode = 'TRANSB' + day + month + year + nextNumber.toString().padStart(3, '0');
                            $('#kode_transaksi_1').val(nextKode);
                            $('#kode_transaksi_' + formNumber).val(nextKode);

                            // for (let i = 0; i < kodeInputs.length; i++) {
                            //     let formNumber = i + 0;
                            //     let nextNumber = currentNumber + formNumber;
                            //     let nextKode = 'BRG' + nextNumber.toString().padStart(3, '0');
                            //     kodeInputs[i].value = nextKode;
                            // }

                            // $('#kode_transaksi').val(nextKode);
                            // document.getElementById(`kode_transaksi_${formNumber}`).value = nextKode;
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        </script>
    


@endsection