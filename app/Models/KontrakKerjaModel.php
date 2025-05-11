<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrakKerjaModel extends Model
{
    use HasFactory;

    protected $table = 'kontrak_kerja';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_karyawan',
        'jenis_kontrak',
        'status_kontrak_lanjutan',
        'tanggal_awal_kontrak_lanjutan',
        'tanggal_akhir_kontrak_lanjutan'
    ];

    public function karyawan()
    {
        return $this->belongsTo(KaryawanModel::class, 'id_karyawan');
    }
}
