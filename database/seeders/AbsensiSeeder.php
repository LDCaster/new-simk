<?php

namespace Database\Seeders;

use App\Models\AbsensiModel;
use App\Models\KaryawanModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawans = KaryawanModel::all();

        foreach ($karyawans as $karyawan) {
            for ($i = 1; $i <= 5; $i++) {
                $status = ['HADIR', 'IZIN', 'SAKIT', 'ALPA'][rand(0, 3)];

                AbsensiModel::create([
                    'karyawan_id' => $karyawan->id,
                    'tanggal' => Carbon::now()->subDays($i),
                    'status_kehadiran' => $status,
                    'keterangan' => in_array($status, ['IZIN', 'SAKIT']) ? 'Keterangan ' . strtolower($status) : null,
                ]);
            }
        }
    }
}
