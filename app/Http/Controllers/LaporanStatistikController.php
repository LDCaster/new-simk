<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanStatistikController extends Controller
{
    public function index()
    {
        $data = DB::table('karyawan')
            ->select(
                'dept',
                DB::raw("SUM(CASE WHEN absensis.status_kehadiran = 'HADIR' THEN 1 ELSE 0 END) as hadir"),
                DB::raw("SUM(CASE WHEN absensis.status_kehadiran = 'IZIN' THEN 1 ELSE 0 END) as izin"),
                DB::raw("SUM(CASE WHEN absensis.status_kehadiran = 'SAKIT' THEN 1 ELSE 0 END) as sakit"),
                DB::raw("SUM(CASE WHEN absensis.status_kehadiran = 'ALPA' THEN 1 ELSE 0 END) as alpa")
            )
            ->join('absensis', 'karyawan.id', '=', 'absensis.karyawan_id')
            ->groupBy('dept')
            ->get();

        return view('pages.laporan_statistik.index', [
            'title'     => 'Laporan Statistik',
            'breadcome' => 'Laporan Statistik',
            'data'      => $data,
        ]);
    }
}
