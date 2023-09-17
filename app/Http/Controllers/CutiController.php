<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.cuti.index', [
            'title' => 'Data Cuti Karyawan',
            'Cuti' => Cuti::with('karyawan')->get()
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
        // dd($request->all());
        $validateData = $request->validate([
            'nik' => 'required',
            'jenis_cuti' => 'required',
            'tanggal' => 'required',
        ]);

        // dd($validateData);
        Cuti::create($validateData);

        return redirect('/absensi/cuti')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuti = Cuti::where('id', $id)->first();
        return view('admin.cuti.edit', [
            'title' => 'Edit Data Cuti',
            'cuti' => $cuti,
            'karyawan' => Karyawan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);

        $validateData = $request->validate([
            'nik' => 'required',
            'jenis_cuti' => 'required',
            'tanggal' => 'required',
        ]);
        // dd($validateData);
        $cuti->update([
            'nik' => $request->input('nik'),
            'jenis_cuti' => $request->input('jenis_cuti'),
            'tanggal' => $request->input('tanggal'),
        ]);

        return redirect('/absensi/cuti')->with('success', 'Data has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        // dd($cuti);
        $cuti->delete();
        return redirect('/absensi/cuti')->with('success', 'DataCuti berhasil dihapus.');
    }
}
