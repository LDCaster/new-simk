<?php

namespace App\Http\Controllers;

use App\Models\AbsensiModel;
use App\Models\KaryawanModel;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $tanggalArray = [];

        for ($i = 1; $i <= $jumlahHari; $i++) {
            $tanggalArray[] = sprintf('%04d-%02d-%02d', $tahun, $bulan, $i);
        }

        $karyawans = KaryawanModel::with(['absensis' => function ($q) use ($bulan, $tahun) {
            $q->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
        }])->get();

        return view('pages.absensi.index', [
            'title'       => 'Data Absensi',
            'breadcome'   => 'Data Absensi',
            'tanggalArray' => $tanggalArray,
            'karyawans'   => $karyawans,
            'bulan'       => $bulan,
            'tahun'       => $tahun
        ]);
    }
}
