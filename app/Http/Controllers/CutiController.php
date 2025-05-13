<?php

namespace App\Http\Controllers;

use App\Models\CutiModel;
use App\Models\Karyawan;
use App\Models\KaryawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        $cuti = CutiModel::with('karyawan')->get();
        return view('pages.cuti.index', [
            'title'     => 'Data Cuti',
            'breadcome' => 'Data Cuti',
            'cuti'      => $cuti,
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        if (in_array($user->role, ['super admin', 'hrd'])) {
            // HRD dan Super Admin bisa lihat semua karyawan
            $karyawan = KaryawanModel::all();
        } else {
            // User biasa hanya bisa lihat dirinya sendiri
            $karyawan = KaryawanModel::where('user_id', $user->id)->get();
        }

        return view('pages.cuti.create', [
            'title'     => 'Ajukan Cuti',
            'breadcome' => 'Ajukan Cuti',
            'karyawan'  => $karyawan
        ]);
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'karyawan_id'   => 'required|exists:karyawan,id',
            'tanggal_cuti'  => 'required|date',
            'alasan'        => 'nullable|string',
        ]);

        if (!in_array($user->role, ['super admin', 'hrd'])) {
            // Cek apakah user mencoba ajukan cuti untuk orang lain
            $karyawan = KaryawanModel::where('id', $request->karyawan_id)
                ->where('user_id', $user->id)
                ->first();

            if (!$karyawan) {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengajukan cuti untuk karyawan ini.');
            }
        }

        CutiModel::create($request->all());

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diajukan!');
    }


    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status_pengajuan' => 'required|in:DIAJUKAN,DISETUJUI_PENGAWAS,DISETUJUI_HRD,DISETUJUI_PJO,DITOLAK',
        ]);

        $cuti = CutiModel::findOrFail($id);
        $cuti->status_pengajuan = $request->status_pengajuan;
        $cuti->save();

        return redirect()->route('cuti.index')->with('success', 'Status cuti diperbarui.');
    }

    public function destroy($id)
    {
        // Mencari data cuti berdasarkan ID
        $cuti = CutiModel::findOrFail($id);

        // Melakukan pengecekan apakah yang menghapus adalah superadmin, HRD, atau karyawan dengan status pengajuan yang belum disetujui pengawas
        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'hrd' || ($cuti->status_pengajuan == 'DIAJUKAN' && Auth::user()->role == 'karyawan')) {
            $cuti->delete();
            return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil dihapus');
        }

        return redirect()->route('cuti.index')->with('error', 'Tidak memiliki izin untuk menghapus pengajuan cuti ini');
    }
}
