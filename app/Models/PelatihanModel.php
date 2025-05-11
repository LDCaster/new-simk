<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanModel extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';
    protected $fillable = [
        'id_karyawan',
        'nama_pelatihan',
        'tanggal_pelatihan',
        'file_pelatihan'
    ];

    public function karyawan()
    {
        return $this->belongsTo(KaryawanModel::class, 'id_karyawan');
    }
}
