<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResignModel extends Model
{
    // use HasFactory;

    protected $table = 'resignasi';

    protected $fillable = [
        'id_karyawan',
        'tanggal_keluar',
        'keterangan_keluar',
    ];

    public function karyawan()
    {
        return $this->belongsTo(KaryawanModel::class, 'id_karyawan');
    }
}
