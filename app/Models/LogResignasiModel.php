<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogResignasiModel extends Model
{
    use HasFactory;

    protected $table = 'log_resignasi';

    protected $fillable = [
        'id_resignasi',
        'id_karyawan',
        'tanggal_keluar',
        'keterangan_keluar',
        'aksi'
    ];

    public function resignasi()
    {
        return $this->belongsTo(LogResignasiModel::class, 'id_resignasi');
    }
    public function karyawan()
    {
        return $this->belongsTo(KaryawanModel::class, 'id_karyawan');
    }
}
