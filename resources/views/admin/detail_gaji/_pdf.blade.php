<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
        }
        .slip-container {
            display: flex;
            flex-direction: row; /* Atur slip gaji secara horizontal */
            justify-content: space-between; /* Ruang antara slip gaji */
        }
        .slip-gaji {
            width: 30%;
            box-sizing: border-box;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            margin-right: 10px; /* Jarak antara slip gaji */
        }
        .slip-gaji h1 {
            text-align: center;
        }
        .info {
            margin-bottom: 20px;
        }
        .info span {
            font-weight: bold;
        }
        .table {
            width: 80%; /* Mengurangi lebar tabel */
            margin: 0 auto; /* Pusatkan tabel */
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 4px; /* Mengurangi padding sel */
            border: 1px solid #ccc;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="slip-container">
        @foreach ($gaji as $item)
        <div class="slip-gaji">
            <h1>Slip Gaji</h1>
            <div class="info">
                <p><span>Nama:</span> {{ $item->karyawan->nama }}</p>
                <p><span>Tanggal Slip Gaji:</span> {{ date("d - M - y") }}</p>
            </div>
            <table class="table">
                <tr>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td>Gaji Pokok</td>
                    <td>Rp {{ $item->karyawan->gaji_pokok }}</td>
                </tr>
                <tr>
                    <td>Potongan</td>
                    <td>Rp </td>
                </tr>
                <tr>
                    <td>Tunjangan</td>
                    <td>Rp. {{ $item->karyawan->tunjangan }}</td>
                </tr>
            </table>
            <div class="total">
                <p><span>Total Gaji:</span> Rp 5,500,000</p>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</body>
</html>
