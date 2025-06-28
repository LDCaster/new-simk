<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanStatistikController extends Controller
{
    public function index()
    {
        // Data absensi per departemen (sudah ada)
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

        // Karyawan MASUK per tahun (dari karyawan.tanggal_masuk)
        $masukPerTahun = DB::table('karyawan')
            ->select(
                DB::raw("YEAR(tanggal_masuk) as tahun"),
                DB::raw("COUNT(*) as total_masuk")
            )
            ->whereNotNull('tanggal_masuk')
            ->groupBy(DB::raw("YEAR(tanggal_masuk)"))
            ->orderBy('tahun')
            ->get();

        // Karyawan KELUAR per tahun (dari resignasi.tanggal_keluar)
        $keluarPerTahun = DB::table('resignasi')
            ->select(
                DB::raw("YEAR(tanggal_keluar) as tahun"),
                DB::raw("COUNT(*) as total_keluar")
            )
            ->whereNotNull('tanggal_keluar')
            ->groupBy(DB::raw("YEAR(tanggal_keluar)"))
            ->orderBy('tahun')
            ->get();

        return view('pages.laporan_statistik.index', [
            'title'          => 'Laporan Statistik',
            'breadcome'      => 'Laporan Statistik',
            'data'           => $data,
            'masukPerTahun'  => $masukPerTahun,
            'keluarPerTahun' => $keluarPerTahun,
        ]);
    }
}
