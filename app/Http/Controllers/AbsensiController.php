<?php

namespace App\Http\Controllers;

use App\Models\AbsensiModel;
use App\Models\KaryawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AbsensiController extends Controller
{
    public function index(Request $request)
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


    public function bulkUpdate(Request $request)
    {
        $data = $request->input('absensi', []);
        Log::info('Data Absensi Diterima:', ['data' => $data]);

        foreach ($data as $karyawan_id => $tanggalArray) {
            foreach ($tanggalArray as $tanggal => $status) {
                Log::info("Karyawan $karyawan_id - $tanggal => $status");
                if ($status) {
                    AbsensiModel::updateOrCreate(
                        ['karyawan_id' => $karyawan_id, 'tanggal' => $tanggal],
                        ['status_kehadiran' => $status]
                    );
                }
            }
        }

        return redirect()->route('absensi.index', [
            'bulan' => date('m'),
            'tahun' => date('Y')
        ])->with('success', 'Absensi berhasil disimpan!');
    }
}
