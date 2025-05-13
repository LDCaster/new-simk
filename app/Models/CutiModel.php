<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CutiModel extends Model
{
    protected $table = 'cutis';

    protected $fillable = [
        'karyawan_id',
        'tanggal_cuti',
        'alasan',
        'status_pengajuan',
    ];

    /**
     * Relasi ke model Karyawan
     */
    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(KaryawanModel::class, 'karyawan_id');
    }
}
