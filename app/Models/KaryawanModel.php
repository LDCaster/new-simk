<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;

    protected $table = 'karyawan'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key tabel
    public $timestamps = true; // created_at & updated_at

    protected $fillable = [
        'user_id',
        'nik',
        'nip',
        'nama',
        'sbu',
        'bagian',
        'dept',
        'location',
        'tanggal_masuk',
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
        'status_perkawinan',

        'no_npwp',
        'no_bpjs_kesehatan',
        'no_bpjs_ketenagakerjaan',
        'bank_account',
        'no_bank',
        'no_sim',
        'expired_sim',
        'no_simper',
        'expired_simper'
    ];

    public function resign()
    {
        return $this->hasOne(ResignModel::class, 'id_karyawan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function absensis()
    {
        return $this->hasMany(AbsensiModel::class, 'karyawan_id');
    }
}
