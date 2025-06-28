<?php

namespace App\Http\Controllers;

use App\Models\CutiModel;
use App\Models\KaryawanModel;
use App\Models\ResignModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalKaryawan = null;
        $totalResign   = null;
        $totalPengguna = null;

        // Kalau Super Admin, hitung statistik
        if ($user->role === 'super admin') {
            $totalKaryawan = KaryawanModel::count();
            $totalResign   = ResignModel::count();
            $totalPengguna = User::count();
        }

        // Cari data karyawan user
        $karyawan = $user->karyawan;

        $absensi = null;
        $nextCuti = null;
        $cuti = null;

        if ($karyawan) {
            $absensi = $karyawan->absensis()->latest()->first();
            $nextCuti = Carbon::parse($karyawan->tanggal_masuk)->addYear()->format('Y-m-d');
            $cuti = CutiModel::where('karyawan_id', $karyawan->id)->latest('created_at')->first();
        }

        return view('pages.dashboard', [
            'title'         => 'Dashboard',
            'breadcome'     => 'Dashboard',
            'totalKaryawan' => $totalKaryawan,
            'totalResign'   => $totalResign,
            'totalPengguna' => $totalPengguna,
            'karyawan'      => $karyawan,
            'absensi'       => $absensi,
            'nextCuti'      => $nextCuti,
            'cuti'          => $cuti,
        ]);
    }
}
