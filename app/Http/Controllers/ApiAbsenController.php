<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class ApiAbsenController extends Controller
{
    public function api()
    {
        $absensi = Absen::with('karyawan')->get();

        return response()->json($absensi, 200);
    }

    public function getJumlahSakit(Request $request)
    {
        $bulan = $request->bulan;

        $absensi = Karyawan::select('id', 'nik')->WithCount(
            ['absen' => function ($query) use ($bulan) {
                $query->where('keterangan', 'Sakit')->whereMonth('tanggal', $bulan);
            }]
        )->get();

        return response()->json($absensi, 200);
    }
}
