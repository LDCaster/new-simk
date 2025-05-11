<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogResignasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('log_resignasi')->insert([
            [
                'id_resignasi' => 1,
                'id_karyawan' => 1,
                'tanggal_keluar' => Carbon::now()->subDays(10)->toDateString(),
                'keterangan_keluar' => 'Mengundurkan diri dengan alasan pribadi.',
                'aksi' => 'update',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
