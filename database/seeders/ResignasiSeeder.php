<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResignasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resignasi')->insert([
            [
                'id_karyawan' => 1,
                'tanggal_keluar' => Carbon::now()->subDays(30),
                'keterangan_keluar' => 'Mengundurkan diri untuk pekerjaan baru.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2,
                'tanggal_keluar' => Carbon::now()->subDays(15),
                'keterangan_keluar' => 'Diberhentikan karena restrukturisasi perusahaan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
