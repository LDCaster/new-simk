<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\LogResignasiModel;
use App\Models\ResignModel;
use Illuminate\Http\Request;

class ResignController extends Controller
{
    public function index()
    {
        $resign = ResignModel::with('karyawan')->get();
        $log_resignasi = LogResignasiModel::with('resignasi.karyawan')->latest()->get();

        // Ambil ID karyawan yang sudah resign
        $resignedKaryawanIds = $resign->pluck('id_karyawan')->toArray();
        // Ambil karyawan yang belum resign
        $karyawanBelumResign = KaryawanModel::whereNotIn('id', $resignedKaryawanIds)->get();

        return view('pages.resign.index', [
            'title'      => 'Data Resign',
            'breadcome'  => 'Data Resign',
            'resign'   => $resign, // Kirim data ke view
            'log_resignasi'   => $log_resignasi, // Kirim data ke view
            'karyawanBelumResign' => $karyawanBelumResign, // Kirim data karyawan yang belum resign
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required|exists:karyawan,id',
            'tanggal_keluar' => 'required|date',
            'keterangan_keluar' => 'nullable|string'
        ]);

        $resign = ResignModel::create([
            'id_karyawan' => $request->id_karyawan,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan_keluar' => $request->keterangan_keluar
        ]);

        // Simpan log untuk create
        LogResignasiModel::create([
            'id_resignasi' => $resign->id,
            'id_karyawan' => $resign->id_karyawan,
            'tanggal_keluar' => $resign->tanggal_keluar,
            'keterangan_keluar' => $resign->keterangan_keluar,
            'aksi' => 'create',
            'created_at' => now(), // Waktu pembuatan
        ]);

        return response()->json([
            'status' => 'success',
            'Data Resign berhasil dibuat.'
        ]);
    }

    public function update(Request $request, $id)
    {
        $resign = ResignModel::findOrFail($id);

        // Simpan data lama untuk log
        LogResignasiModel::create([
            'id_resignasi' => $resign->id,
            'id_karyawan' => $resign->id_karyawan,
            'tanggal_keluar' => $resign->tanggal_keluar,
            'keterangan_keluar' => $resign->keterangan_keluar,
            'aksi' => 'update',
            'created_at' => now(), // Waktu update
        ]);

        // Update data kontrak
        $resign->update($request->all());

        return redirect()->back()->with('success', 'Data Resign berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $resign = ResignModel::findOrFail($id);

        // Simpan data lama untuk log
        LogResignasiModel::create([
            'id_resignasi' => $resign->id,
            'id_karyawan' => $resign->id_karyawan,
            'tanggal_keluar' => $resign->tanggal_keluar,
            'keterangan_keluar' => $resign->keterangan_keluar,
            'aksi' => 'delete',
            'created_at' => now(), // Waktu penghapusan
        ]);

        // Hapus data kontrak kerja setelah menyimpannya ke log
        $resign->delete();

        return response()->json(['success' => 'Data Resign berhasil dihapus!']);
    }
}
