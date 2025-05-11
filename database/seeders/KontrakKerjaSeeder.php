<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontrakKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kontrak_kerja')->insert([
            [
                'id_karyawan' => 1,
                'jenis_kontrak' => 'PKWT',
                'status_kontrak_lanjutan' => 1,
                'tanggal_awal_kontrak_lanjutan' => Carbon::now()->subYear(),
                'tanggal_akhir_kontrak_lanjutan' => Carbon::now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2,
                'jenis_kontrak' => 'PKWTT',
                'status_kontrak_lanjutan' => 0,
                'tanggal_awal_kontrak_lanjutan' => Carbon::now()->subMonths(6),
                'tanggal_akhir_kontrak_lanjutan' => Carbon::now()->addMonths(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 3,
                'jenis_kontrak' => 'PKWT/PKWTT',
                'status_kontrak_lanjutan' => 1,
                'tanggal_awal_kontrak_lanjutan' => Carbon::now()->subMonths(3),
                'tanggal_akhir_kontrak_lanjutan' => Carbon::now()->addMonths(9),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
