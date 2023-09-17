<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.karyawan.index', [
            'title' => 'Data Karyawan',
            'karyawan' => Karyawan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.karyawan.create', [
            'title' => 'Input Data Karyawan'

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
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'status' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required',
            'tanggal_masuk' => 'required',

        ]);

        // dd($validateData);
        Karyawan::create($validateData);

        return redirect('/karyawan')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::where('id', $id)->first();
        return view('admin.karyawan.edit', [
            'title' => 'Edit karyawan',
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $karyawan = Karyawan::findOrFail($id);
        // dd($karyawan);
        $validateData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'status' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required',
            'tanggal_masuk' => 'required',

        ]);
        // dd($validateData);
        $karyawan->update([
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'jabatan' => $request->input('jabatan'),
            'status' => $request->input('status'),
            'gaji_pokok' => $request->input('gaji_pokok'),
            'tunjangan' => $request->input('tunjangan'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
        ]);

        return redirect('/karyawan')->with('success', 'Data has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        // dd($karyawan);
        $karyawan->delete();
        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil dihapus.');
    }

    public function gaji()
    {
        return view('admin.gaji.index', [
            'title' => 'Data Gaji Karyawan',
            'karyawan' => Karyawan::all()
        ]);
    }

    public function editgaji($id)
    {
        $karyawan = Karyawan::where('id', $id)->first();
        return view('admin.gaji.edit', [
            'title' => 'Edit Gaji Karyawan',
            'karyawan' => $karyawan
        ]);
    }

    public function updategaji(Request $request, $id)
    {
        // dd($request->all());
        $karyawan = Karyawan::findOrFail($id);
        // dd($karyawan);
        $validateData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required',

        ]);
        // dd($validateData);
        $karyawan->update([
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'gaji_pokok' => $request->input('gaji_pokok'),
            'tunjangan' => $request->input('tunjangan'),
        ]);

        return redirect('/gaji')->with('success', 'Data Gaji has been update!');
    }
}
