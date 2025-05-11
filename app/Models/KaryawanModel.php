<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;

    protected $table = 'karyawan'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key tabel
    public $timestamps = true; // Jika menggunakan created_at & updated_at

    protected $fillable = [
        'user_id',
        'nik',
        'nip',
        'nama',
        'alamat_rumah',
        'no_telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan',
        'status_perkawinan'
    ];
}
