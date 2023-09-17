<?php

namespace Database\Seeders;

use App\Models\Absen;
use App\Models\User;
use App\Models\Karyawan;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Staff',
            'username' => 'staff',
            'email' => 'staff@gmail.com',
            'level' => 'Staff',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'SPV',
            'username' => 'SPV',
            'email' => 'spv@gmail.com',
            'level' => 'SPV',
            'password' => bcrypt('password'),
        ]);

        Karyawan::create([
            'nik' => '123',
            'nama' => 'Arief',
            'tempat_lahir' => 'Jombang',
            'tanggal_lahir' => '1998 - 08 - 11',
            'jenis_kelamin' => 'L',
            'jabatan' => 'Staff',
            'status' => 'Kontrak',
            'gaji_pokok' => '4000000',
            'tunjangan' => '500000',
            'tanggal_masuk' => '2020 - 01 - 01'
        ]);
    }
}
