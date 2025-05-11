<?php

namespace App\Http\Controllers;

use App\Models\KontrakKerjaModel;
use App\Models\LogKontrakKerjaModel;
use Illuminate\Http\Request;

class KontrakKerjaController extends Controller
{
    public function index()
    {
        //
        $kontrak_kerja = KontrakKerjaModel::with('karyawan')->get();
        $log_kontrak = LogKontrakKerjaModel::with('kontrak.karyawan')->latest()->get();

        return view('pages.kontrak_kerja.index', [
            'title'      => 'Data Kontrak Kerja',
            'breadcome'  => 'Kontrak Kerja',
            'kontrak_kerja'   => $kontrak_kerja, // Kirim data ke view
            'log_kontrak'   => $log_kontrak // Kirim data ke view
        ]);
    }

    public function update(Request $request, $id)
    {
        $kontrak = KontrakKerjaModel::findOrFail($id);

        // Simpan data lama untuk log
        LogKontrakKerjaModel::create([
            'id_kontrak_kerja' => $kontrak->id,
            'id_karyawan' => $kontrak->id_karyawan,
            'jenis_kontrak' => $kontrak->jenis_kontrak,
            'status_kontrak_lanjutan' => $kontrak->status_kontrak_lanjutan == 1 ? 'Aktif' : 'Tidak Aktif',
            'tanggal_awal_kontrak_lanjutan' => $kontrak->tanggal_awal_kontrak_lanjutan,
            'tanggal_akhir_kontrak_lanjutan' => $kontrak->tanggal_akhir_kontrak_lanjutan,
            'aksi' => 'update',
            'created_at' => now(), // Waktu update
        ]);

        // Update data kontrak
        $kontrak->update($request->all());

        return redirect()->back()->with('success', 'Data kontrak kerja berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kontrak = KontrakKerjaModel::findOrFail($id);

        // Simpan data lama ke dalam log sebelum menghapus
        LogKontrakKerjaModel::create([
            'id_kontrak_kerja' => $kontrak->id,
            'id_karyawan' => $kontrak->id_karyawan,
            'jenis_kontrak' => $kontrak->jenis_kontrak,
            'status_kontrak_lanjutan' => $kontrak->status_kontrak_lanjutan == 1 ? 'Aktif' : 'Tidak Aktif',
            'tanggal_awal_kontrak_lanjutan' => $kontrak->tanggal_awal_kontrak_lanjutan,
            'tanggal_akhir_kontrak_lanjutan' => $kontrak->tanggal_akhir_kontrak_lanjutan,
            'aksi' => 'delete', // Menandai bahwa kontrak ini dihapus
            'created_at' => now(), // Waktu penghapusan
        ]);

        // Hapus data kontrak kerja setelah menyimpannya ke log
        $kontrak->delete();

        return response()->json(['success' => 'Kontrak kerja berhasil dihapus dan disimpan ke log!']);
    }
}
