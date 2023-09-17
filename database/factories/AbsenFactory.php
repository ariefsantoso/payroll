<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

class AbsenFactory extends Factory
{
    private static $absensi = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tanggal = Carbon::createFromDate(2022, 1, 1)->addDays(self::$absensi++);
        return [
            'nik' => Karyawan::first()->nik,
            'tanggal' => $tanggal->format('Y-m-d'),
            'bulan' => $tanggal->format('m'),
            'keterangan' => function (array $attributes) use ($tanggal) {
                if ($tanggal->format('l') == 'Saturday' || $tanggal->format('l') == 'Sunday') {
                    return "Libur";
                } else {
                    return Arr::random(['Hadir', 'Sakit', 'Cuti Resmi']);
                }
            },
        ];
    }
}
