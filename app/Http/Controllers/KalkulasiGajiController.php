<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Lembur;
use Carbon\Carbon;
use PDF;

use Illuminate\Http\Response;

class KalkulasiGajiController extends Controller
{
    public function index()
    {
        $bulan = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('admin.kalkulasi.index', [
            'title' => 'Kalkulasi Gaji',
            'bulan' => $bulan,
            'namabulan' => $namaBulan
        ]);
    }
    public function detailGaji()
    {
        $bulan = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('admin.detail_gaji.index', [
            'title' => 'Detail Gaji',
            'gaji' => Gaji::all(),
            'bulan' => $bulan,
            'namabulan' => $namaBulan
        ]);
    }
    public function pengesahan()
    {
        $bulan = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('admin.kalkulasi.pengesahan', [
            'title' => 'Pengesahan Gaji',
            'bulan' => $bulan,
            'namabulan' => $namaBulan
        ]);
    }

    public function aksi_pengesahan(Request $request)
    {
        $nilai = 'y';
        $data = Gaji::where('bulan', $request->bulan)->update(['post' => $nilai]);
        if ($data > 0) {
            return redirect()->back()->with('success', 'Data bulan ' . $request->bulan . ' sudah disahkan!');
        } else {
            return redirect()->back()->with('success', 'data tidak ada!');
        }
    }
    public function batalkan_pengesahan()
    {
        $bulan = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('admin.kalkulasi.batalkan_pengesahan', [
            'title' => 'Batalkan Pengesahan Gaji',
            'bulan' => $bulan,
            'namabulan' => $namaBulan
        ]);
    }
    public function spv()
    {
        $bulan = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('admin.kalkulasi.spv', [
            'title' => 'Batalkan Pengesahan Gaji',
            'bulan' => $bulan,
            'namabulan' => $namaBulan
        ]);
    }
    public function batal_pengesahan(Request $request)
    {
        $nilai = 'x';
        $data = Gaji::where('bulan', $request->bulan)->update(['post' => $nilai]);

        if ($data > 0) {
            return redirect()->back()->with('success', 'Data bulan ' . $request->bulan . ' sudah dibatalkan!');
        } else {
            return redirect()->back()->with('success', 'data tidak ada!');
        }
    }
    public function pdf(Request $request)
    {

        $bulan = $request->bulan;

        $data = [
            'title' => 'Slip Gaji',
            'gaji' => Gaji::where('bulan', $bulan)->get()
        ];



        $pdf = PDF::loadView('admin.detail_gaji.pdf', $data);
        $pdf->setPaper('A4', 'portrait');
        return new Response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            // 'Content-Disposition' => 'inline; filename="daftar_produk.pdf"',
        ]);
    }

    public function kalkulasiGaji(Request $request)
    {
        // $karyawan = Karyawan::all();
        $bulan = $request->input('bulan');
        // $karyawan = Karyawan::with('lembur')->get();
        $karyawan = Karyawan::with(['lembur' => function ($query) use ($bulan) {
            $query->whereMonth('tanggal', '=', $bulan);
        }])->get();

        $gajipokok = 0;
        $tunjangan = 0;



        foreach ($karyawan as $karyawanItem) {

            $nik = $karyawanItem->nik;
            $gajipokok = $karyawanItem->gaji_pokok;
            $tunjangan = $karyawanItem->tunjangan;

            $lembur = 0;
            if ($karyawanItem->lembur->isNotEmpty()) {

                foreach ($karyawanItem->lembur as $row) {
                    $lembur += $row->total_upah;
                }
            }




            // dd($totalUpah);

            // foreach ($totalUpahPerNik as $nik => $totalUpah) {
            //     echo "Total Upah untuk Nik $nik adalah: $totalUpah\n";
            // }
            // dd($totalUpah);

            $bpjs = $this->calculateBPJS($karyawanItem);
            $nwnp = $this->calculateNWNP($request->sakit[$karyawanItem->nik], $karyawanItem);
            $insentif =  $this->calculateIncentive($karyawanItem);

            $data = [
                'nik' => $karyawanItem->nik,
                'bulan' => $request->bulan,
                'lembur' => $lembur,
                'bpjs' => $this->calculateBPJS($karyawanItem),
                'nwnp' => $this->calculateNWNP($request->sakit[$karyawanItem->nik], $karyawanItem),
                'insentif' =>  $this->calculateIncentive($karyawanItem),
                'total_gaji' => ($gajipokok + $tunjangan + $lembur + $insentif) - ($bpjs + $nwnp),
                'post' => 'x'
            ];
            // dd($data);
            Gaji::create($data);
        }
        // dd($data);
        return back()->with('success', 'Data bulan ' . $bulan . ' sudah dikalkulasi!');
    }

    private function calculateBPJS($karyawanItem)
    {
        // Tentukan apakah karyawan memenuhi syarat untuk potongan BPJS
        $memenuhiSyaratBPJS = true; // Ganti dengan logika yang sesuai

        // Hitung potongan BPJS jika berlaku
        if ($memenuhiSyaratBPJS) {
            $potonganBPJS = ($karyawanItem->gaji_pokok + $karyawanItem->tunjangan) * 0.03;
        } else {
            $potonganBPJS = 0;
        }

        return $potonganBPJS;
    }

    private function calculateIncentive($karyawanItem)
    {
        $masaKerja = Carbon::parse($karyawanItem->tanggal_masuk)->diffInYears(now());
        $insentif = 1000000 + $masaKerja * 100000; // Sesuaikan dengan rumus insentif Anda
        return $insentif;
    }
    private function calculateNWNP($jumlahHariTidakHadir, $karyawanItem)
    {
        $nwnp = $jumlahHariTidakHadir * $karyawanItem->gaji_pokok / 30;

        return $nwnp;
    }
}
