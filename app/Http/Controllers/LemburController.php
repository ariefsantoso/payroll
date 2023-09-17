<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.lembur.index', [
            'title' => 'Data Lembur',
            'lembur' => Lembur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lembur.create', [
            'title' => 'Tambah Data Lembur',
            'karyawan' => Karyawan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $datakaryawan = Karyawan::where('nik', $request->input('nik'))->first();

        if ($datakaryawan->status === 'Tetap' || $datakaryawan->status === 'Kontrak') {
            $upahLemburPerJam = ($datakaryawan->gaji_pokok + $datakaryawan->tunjangan) / 173;
        } elseif ($datakaryawan->status === 'HL') {
            $upahLemburPerJam = $datakaryawan->gaji_pokok / 173;
        } else {
            $upahLemburPerJam = 0;
        }

        $jamLemburDariDatabase = $request->input('jumlah_jam'); // Anda perlu mengganti ini dengan sumber data yang sesuai

        // Menghitung jam lembur sesuai dengan penjabaran
        $jamLemburPenjabaran = 0;

        if ($jamLemburDariDatabase > 4) {
            // Menghitung jam lembur pertama (4 jam pertama dikalikan 1)
            $jamLemburPenjabaran += 4 * 1;

            // Menghitung jam lembur setelah 4 jam (dikalikan 2)
            $jamLemburPenjabaran += ($jamLemburDariDatabase - 4) * 2;
        } else {
            // Jika jam lembur kurang dari atau sama dengan 4 jam, semua jam dikalikan 1
            $jamLemburPenjabaran = $jamLemburDariDatabase * 1;
        }


        // dd($jamLemburPenjabaran);
        // Hitung total upah lembur
        $upahLembur = $upahLemburPerJam * $jamLemburPenjabaran;
        $upahLembur = number_format($upahLembur, 0, '', '');

        $validateData = $request->validate([
            'nik' => 'required',
            'jumlah_jam' => 'required',
            'tanggal' => 'required'
        ]);

        // $coba = ([
        //     'nik' => $request->input('nik'),
        //     'jumlah_jam' => $request->input('jumlah_jam'),
        //     'total_upah' => $upahLembur,
        //     'tanggal' => $request->input('tanggal')
        // ]);
        // dd($coba);
        Lembur::create([
            'nik' => $request->input('nik'),
            'jumlah_jam' => $request->input('jumlah_jam'),
            'total_upah' => $upahLembur,
            'tanggal' => $request->input('tanggal')
        ]);
        // return $upahLembur;
        // dd($validateData);
        return redirect('/absensi/lembur')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function show(Lembur $lembur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function edit(Lembur $lembur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lembur $lembur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lembur $lembur)
    {
        //
    }
}
