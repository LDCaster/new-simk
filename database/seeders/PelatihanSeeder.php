<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawanIds = DB::table('karyawan')->pluck('id');

        if ($karyawanIds->isEmpty()) {
            $this->command->warn("Tidak ada data karyawan. Harap tambahkan karyawan terlebih dahulu.");
            return;
        }

        foreach ($karyawanIds as $id_karyawan) {
            // Setiap karyawan memiliki 3 data pelatihan
            for ($i = 0; $i < 3; $i++) {
                DB::table('pelatihan')->insert([
                    'id_karyawan' => $id_karyawan,
                    'nama_pelatihan' => 'Pelatihan ' . Str::random(10),
                    'tanggal_pelatihan' => now()->subDays(rand(1, 365)),
                    'file_pelatihan' => 'pelatihan_' . Str::random(5) . '.pdf',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
