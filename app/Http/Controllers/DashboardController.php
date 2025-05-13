<?php

namespace App\Http\Controllers;

use App\Models\CutiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $karyawan = $user->karyawan;

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        // Ambil absensi terakhir
        $absensi = $karyawan->absensis()->latest()->first();

        // Jadwal cuti berikutnya
        $nextCuti = Carbon::parse($karyawan->tanggal_masuk)->addYear()->format('Y-m-d');

        // Ambil pengajuan cuti terakhir oleh karyawan ini
        $cuti = CutiModel::where('karyawan_id', $karyawan->id)->latest('created_at')->first();

        return view('pages.dashboard', [
            'title'     => 'Dashboard',
            'breadcome' => 'Dashboard',
            'karyawan'  => $karyawan,
            'absensi'   => $absensi,
            'nextCuti'  => $nextCuti,
            'cuti'      => $cuti,
        ]);
    }
}
