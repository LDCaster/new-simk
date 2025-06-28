<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\PelatihanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihan = PelatihanModel::with('karyawan')
            ->orderBy('tanggal_pelatihan', 'desc')
            ->get()
            ->unique('id_karyawan')
            ->values(); // reset indexing
        $karyawan = KaryawanModel::all();

        return view('pages.pelatihan.index', [
            'title'      => 'Data Pelatihan',
            'breadcome'  => 'Data Pelatihan',
            'pelatihan'   => $pelatihan, // Kirim data ke view
            'karyawan'   => $karyawan, // Kirim data ke view
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required|exists:karyawan,id',
            'nama_pelatihan' => 'required|string|max:255',
            'tanggal_pelatihan' => 'required|date',
            'file_pelatihan' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $fileName = null;

        if ($request->hasFile('file_pelatihan')) {
            $file = $request->file('file_pelatihan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('assets/data_pelatihan/file_pelatihan', $fileName, 'public');
        }

        PelatihanModel::create([
            'id_karyawan' => $request->id_karyawan,
            'nama_pelatihan' => $request->nama_pelatihan,
            'tanggal_pelatihan' => $request->tanggal_pelatihan,
            'file_pelatihan' => $fileName,
        ]);

        return response()->json(['status' => 'Data pelatihan berhasil ditambahkan.']);
    }

    public function getHistoryPelatihan($karyawan_id)
    {
        $terbaru = PelatihanModel::where('id_karyawan', $karyawan_id)
            ->orderBy('tanggal_pelatihan', 'desc')
            ->first();

        $history = PelatihanModel::where('id_karyawan', $karyawan_id)
            ->where('id', '!=', $terbaru->id ?? 0)
            ->orderBy('tanggal_pelatihan', 'desc')
            ->get();

        return response()->json($history);
    }

    public function destroy($id)
    {
        $pelatihan = PelatihanModel::findOrFail($id);

        if ($pelatihan->file_pelatihan && Storage::disk('public')->exists('assets/data_pelatihan/file_pelatihan/' . $pelatihan->file_pelatihan)) {
            Storage::disk('public')->delete('assets/data_pelatihan/file_pelatihan/' . $pelatihan->file_pelatihan);
        }

        $pelatihan->delete();

        return response()->json(['message' => 'Pelatihan berhasil dihapus.']);
    }

    public function destroyByKaryawan($id)
    {
        $pelatihans = PelatihanModel::where('id_karyawan', $id)->get();

        foreach ($pelatihans as $pelatihan) {
            if ($pelatihan->file_pelatihan && Storage::disk('public')->exists('assets/data_pelatihan/file_pelatihan/' . $pelatihan->file_pelatihan)) {
                Storage::disk('public')->delete('assets/data_pelatihan/file_pelatihan/' . $pelatihan->file_pelatihan);
            }
            $pelatihan->delete();
        }

        return response()->json(['message' => 'Semua pelatihan karyawan berhasil dihapus.']);
    }
}
