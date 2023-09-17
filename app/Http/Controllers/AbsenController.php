<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cuti.index', [
            'title' => 'Data Absensi Karyawan',
            'absen' => Absen::with('karyawan')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cuti.create', [
            'title' => 'Tambah Data Cuti',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $absen = Absen::where('id', $id)->first();
        // dd($absen);
        return view('admin.cuti.edit', [
            'title' => 'Edit Data Cuti',
            'absen' => $absen,
            'karyawan' => Karyawan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $absen = Absen::findOrFail($id);
        // dd($absen);
        // $validateData = $request->validate([
        //     'nik' => 'required',
        //     'keterangan' => 'required',
        //     'tanggal' => 'required',
        //     'bulan' => 'required'
        // ]);
        // dd($validateData);
        $absen->update([
            'nik' => $request->input('nik'),
            'keterangan' => $request->input('keterangan'),
            'tanggal' => $request->input('tanggal'),
            'bulan' => $request->input('bulan')
        ]);

        return redirect('/absensi/cuti')->with('success', 'Data has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }



    public function absenapi()
    {
        return view('admin.absensi.index', [
            "title" => "absensi"
        ]);
    }
}
