<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPlanModel extends Model
{
    use HasFactory;

    // Specify the correct table name
    protected $table = 'training_plans';

    protected $fillable = ['karyawan_id', 'no_id', 'nama_pelatihan', 'target_pelatihan', 'cost'];

    public function karyawan()
    {
        return $this->belongsTo(KaryawanModel::class, 'karyawan_id');
    }
}
