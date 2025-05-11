<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogKontrakKerjaModel extends Model
{
    use HasFactory;

    protected $table = 'log_kontrak_kerja';

    protected $fillable = [
        'id_kontrak_kerja',
        'id_karyawan',
        'jenis_kontrak',
        'status_kontrak_lanjutan',
        'tanggal_awal_kontrak_lanjutan',
        'tanggal_akhir_kontrak_lanjutan',
        'aksi'
    ];

    public function kontrak()
    {
        return $this->belongsTo(KontrakKerjaModel::class, 'id_kontrak_kerja');
    }
    public function karyawan()
    {
        return $this->belongsTo(KaryawanModel::class, 'id_karyawan');
    }
}
