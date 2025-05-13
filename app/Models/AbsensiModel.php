<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbsensiModel extends Model
{
    use HasFactory;

    protected $table = 'absensis'; // Nama tabel di database
    protected $primaryKey = 'id';
    public $timestamps = true; // Jika menggunakan created_at & updated_at

    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'kehadiran', // hadir, izin, alpa, sakit
        'keterangan', // jika izin/sakit
    ];

    /**
     * Relasi ke model Karyawan
     */
    public function karyawan()
    {
        return $this->belongsTo(KaryawanModel::class, 'karyawan_id');
    }
}
