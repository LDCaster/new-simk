<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
            [
                'user_id' => 1,
                'nik' => '3210012345678901',
                'nip' => '12345678',
                'nama' => 'Budi Santoso',
                'alamat_rumah' => 'Jl. Merdeka No. 123, Jakarta',
                'no_telepon' => '081234567890',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-05-10',
                'jenis_kelamin' => 'L',
                'pendidikan' => 'S1 Teknik Informatika',
                'status_perkawinan' => 'Menikah',
                'tanggal_masuk' => '2021-06-01',
                'dept' => 'IT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'nik' => '3210098765432101',
                'nip' => '87654321',
                'nama' => 'Siti Aminah',
                'alamat_rumah' => 'Jl. Sudirman No. 456, Bandung',
                'no_telepon' => '082345678901',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1995-08-15',
                'jenis_kelamin' => 'P',
                'pendidikan' => 'S2 Manajemen',
                'status_perkawinan' => 'Belum Menikah',
                'tanggal_masuk' => '2020-01-15',
                'dept' => 'HRD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'nik' => '3210023456789012',
                'nip' => '23456789',
                'nama' => 'Ahmad Fauzi',
                'alamat_rumah' => 'Jl. Diponegoro No. 789, Surabaya',
                'no_telepon' => '083456789012',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1988-12-20',
                'jenis_kelamin' => 'L',
                'pendidikan' => 'D3 Akuntansi',
                'status_perkawinan' => 'Menikah',
                'tanggal_masuk' => '2018-09-20',
                'dept' => 'Finance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'nik' => '3210034567890123',
                'nip' => '34567890',
                'nama' => 'Ratna Dewi',
                'alamat_rumah' => 'Jl. Ahmad Yani No. 12, Semarang',
                'no_telepon' => '084567890123',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1992-07-22',
                'jenis_kelamin' => 'P',
                'pendidikan' => 'S1 Sipil',
                'status_perkawinan' => 'Menikah',
                'tanggal_masuk' => '2019-03-10',
                'dept' => 'Proyek',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'nik' => '3210045678901234',
                'nip' => '45678901',
                'nama' => 'Dedi Pratama',
                'alamat_rumah' => 'Jl. Gajah Mada No. 34, Yogyakarta',
                'no_telepon' => '085678901234',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1994-03-05',
                'jenis_kelamin' => 'L',
                'pendidikan' => 'SMA',
                'status_perkawinan' => 'Belum Menikah',
                'tanggal_masuk' => '2022-05-15',
                'dept' => 'Umum',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
