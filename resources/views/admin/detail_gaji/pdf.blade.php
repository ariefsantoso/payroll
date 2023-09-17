<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .info {
            width: 40%;
        }
        .info h4 {
            margin-top: 0;
            margin-bottom: 5px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
        }
        .items-table th,
        .items-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
   
@if (count($gaji)>0)
    

    <div class="container">
        @foreach ($gaji as $item)
        @php
        $pesan = '';
            if ($item->post == 'x'){
                $pesan = 'Data Belum disahkan';
            }
            elseif($item->post == 'y'){
                $pesan = 'Data Sudah disahkan';
            }else {
                
            }
            
        @endphp
        <div class="header">
            <h1>SLIP Gaji</h1>
            {{-- <p><b>{{ ($transaksis->kode_transaksi) }}</b></p> --}}
            <p>Date: {{ Date('d M Y') }}</p>
            <p>Pesan : {{ $pesan }}</p>
        </div>
        <div class="invoice-details">
            <div class="info">
                <h4>Nama: {{ $item->karyawan->nama }}</h4>
            </div>
        </div>
        <br>
        <br>
        <table class="items-table">
            <tr>
                <th scope="col">Gaji Pokok</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Rp. {{ number_format($item->karyawan->gaji_pokok, 0, ',', '.') }}</th>
            </tr>
            <tr>
                <th scope="col">Tunjangan</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Rp. {{ number_format($item->karyawan->tunjangan, 0, ',', '.') }}</th>
            </tr>
            <tr>
                <th scope="col">insentiv</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Rp. {{ number_format($item->insentif, 0, ',', '.') }}</th>
            </tr>
           
            <tr>
                <th scope="col">Lembur</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Rp. {{ number_format($item->lembur, 0, ',', '.') }}</th>
            </tr>
           
            <br>
            <tr>
                <th scope="col">Total</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Rp. {{ number_format($item->karyawan->gaji_pokok+ $item->karyawan->tunjangan + $item->insentif + $item->lembur, 0, ',', '.') }}</th>
            </tr>

            
            <tr>
                <th scope="col">BPJS</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Rp. {{ number_format($item->bpjs, 0, ',', '.') }}</th>
            </tr>
            
            <tr>
                <th scope="col">NWNP</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Rp. {{ number_format($item->nwnp, 0, ',', '.') }}</th>
            </tr>
            <br>
            <tr>
                <th scope="col">Total Upah</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Rp. {{ number_format($item->total_gaji  , 0, ',', '.') }}</th>
            </tr>





            
            
           
            
                
             
            <!-- Add more items here -->
        </table>
        <div class="total">
            {{-- <p>Total: {{ number_format($total_harga, 0, ',', '.') }}</p> --}}
        </div>
        @endforeach
    </div>
    <br>
@else
    <p>Tidak ada data</p>    
@endif
</body>
</html>
