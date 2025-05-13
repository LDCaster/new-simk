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

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'nik',
        'nip',
        'nama',
        'sbu',
        'bagian',
        'status_karyawan',
        'mcu_terakhir',
        'catatan_mcu',
        'catatan_penting_tanggal',
        'catatan_penting_kasus',
        'catatan_penting_keterangan',
        'emergency_call_nama',
        'emergency_call_no_telpon',
        'alamat_rumah',
        'no_telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan',
        'status_perkawinan'
    ];

    public function resign()
    {
        return $this->hasOne(ResignModel::class, 'id_karyawan'); // sesuaikan nama kolomnya
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
