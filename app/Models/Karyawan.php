<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nama',  'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'jabatan', 'status', 'gaji_pokok', 'tunjangan', 'tanggal_masuk'];
    public function absen()
    {
        return $this->hasMany(Absen::class, 'nik', 'nik');
    }
    public function lembur()
    {
        return $this->hasMany(Lembur::class, 'nik', 'nik');
    }
    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
    }
}
