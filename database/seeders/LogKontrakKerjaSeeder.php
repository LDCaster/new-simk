<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogKontrakKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_kontrak_kerja' => 1, // Sesuaikan dengan ID yang ada di tabel kontrak_kerja
                'id_karyawan' => 1, // Sesuaikan dengan ID yang ada di tabel karyawan
                'jenis_kontrak' => 'Kontrak Tahunan',
                'status_kontrak_lanjutan' => 'Diperpanjang',
                'tanggal_awal_kontrak_lanjutan' => '2025-01-01',
                'tanggal_akhir_kontrak_lanjutan' => '2025-12-31',
                'aksi' => 'update',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Masukkan data ke dalam database
        DB::table('log_kontrak_kerja')->insert($data);
    }
}
