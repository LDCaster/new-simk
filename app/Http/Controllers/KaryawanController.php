<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\KontrakKerjaModel;
use App\Models\LogKontrakKerjaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        // Ambil semua data karyawan dengan relasi ke tabel resign
        $karyawan = KaryawanModel::with('resign')->get();

        // Tambahkan properti status_akhir untuk logika aktif/tidak aktif
        foreach ($karyawan as $item) {
            if ($item->resign) {
                $item->status_akhir = 'tidak aktif';
            } else {
                $item->status_akhir = $item->status_karyawan ?? 'aktif';
            }
        }

        return view('pages.karyawan.index', [
            'title'      => 'Data Karyawan',
            'breadcome'  => 'Karyawan',
            'karyawan'   => $karyawan // Kirim data ke view
        ]);
    }

    public function show($id)
    {
        $karyawan = KaryawanModel::findOrFail($id);

        return response()->json([
            'nama' => $karyawan->nama,
            'alamat_rumah' => $karyawan->alamat_rumah,
            'mcu_terakhir' => $karyawan->mcu_terakhir,
            'bpjs_kesehatan' => $karyawan->no_bpjs_kesehatan,
            'bpjs_ketenagakerjaan' => $karyawan->no_bpjs_ketenagakerjaan,
        ]);
    }


    public function create()
    {
        return view('pages.karyawan.create', [
            'title'      => 'Tambah Karyawan',
            'breadcome'  => 'Tambah Data Karyawan'
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:super admin,hrd,pengawas,pjo,karyawan',
            'status' => 'required|in:aktif,tidak aktif,berhenti',

            // Data karyawan
            'nik' => 'nullable|string|max:20',
            'nip' => 'nullable|string|max:20',
            'nama' => 'nullable|string|max:100',
            'sbu' => 'nullable|string|max:100',
            'bagian' => 'nullable|string|max:100',
            'status_karyawan' => 'nullable|in:aktif,nonaktif',
            'mcu_terakhir' => 'nullable|date',
            'catatan_mcu' => 'nullable|string',
            'catatan_penting_tanggal' => 'nullable|date',
            'catatan_penting_kasus' => 'nullable|string|max:100',
            'catatan_penting_keterangan' => 'nullable|string',
            'emergency_call_nama' => 'nullable|string|max:100',
            'emergency_call_no_telpon' => 'nullable|string|max:15',
            'alamat_rumah' => 'nullable|string',
            'no_telepon' => 'nullable|string|max:15',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'pendidikan' => 'nullable|string|max:50',
            'status_perkawinan' => 'nullable|in:Belum Menikah,Menikah',

            // Tambahan data baru
            'dept' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'tanggal_masuk' => 'nullable|date',
            'no_npwp' => 'nullable|string|max:30',
            'no_bpjs_kesehatan' => 'nullable|string|max:30',
            'no_bpjs_ketenagakerjaan' => 'nullable|string|max:30',
            'bank_account' => 'nullable|string|max:100',
            'no_bank' => 'nullable|string|max:30',
            'no_sim' => 'nullable|string|max:30',
            'expired_sim' => 'nullable|date',
            'no_simper' => 'nullable|string|max:30',
            'expired_simper' => 'nullable|date',
        ]);

        DB::beginTransaction();

        try {
            // Simpan data ke tabel users
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
                'status' => $validated['status'],
            ]);

            // Simpan data ke tabel karyawan
            $karyawan = KaryawanModel::create([
                'user_id' => $user->id,
                'nik' => $validated['nik'] ?? null,
                'nip' => $validated['nip'] ?? null,
                'nama' => $validated['nama'] ?? null,
                'sbu' => $validated['sbu'] ?? null,
                'bagian' => $validated['bagian'] ?? null,
                'status_karyawan' => $validated['status_karyawan'] ?? null,
                'mcu_terakhir' => $validated['mcu_terakhir'] ?? null,
                'catatan_mcu' => $validated['catatan_mcu'] ?? null,
                'catatan_penting_tanggal' => $validated['catatan_penting_tanggal'] ?? null,
                'catatan_penting_kasus' => $validated['catatan_penting_kasus'] ?? null,
                'catatan_penting_keterangan' => $validated['catatan_penting_keterangan'] ?? null,
                'emergency_call_nama' => $validated['emergency_call_nama'] ?? null,
                'emergency_call_no_telpon' => $validated['emergency_call_no_telpon'] ?? null,
                'alamat_rumah' => $validated['alamat_rumah'] ?? null,
                'no_telepon' => $validated['no_telepon'] ?? null,
                'tempat_lahir' => $validated['tempat_lahir'] ?? null,
                'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
                'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
                'pendidikan' => $validated['pendidikan'] ?? null,
                'status_perkawinan' => $validated['status_perkawinan'] ?? null,

                // Tambahan
                'departemen' => $validated['departemen'] ?? null,
                'lokasi' => $validated['lokasi'] ?? null,
                'tanggal_masuk' => $validated['tanggal_masuk'] ?? null,
                'no_npwp' => $validated['no_npwp'] ?? null,
                'no_bpjs_kesehatan' => $validated['no_bpjs_kesehatan'] ?? null,
                'no_bpjs_ketenagakerjaan' => $validated['no_bpjs_ketenagakerjaan'] ?? null,
                'bank_account' => $validated['bank_account'] ?? null,
                'no_bank' => $validated['no_bank'] ?? null,
                'no_sim' => $validated['no_sim'] ?? null,
                'expired_sim' => $validated['expired_sim'] ?? null,
                'no_simper' => $validated['no_simper'] ?? null,
                'expired_simper' => $validated['expired_simper'] ?? null,
            ]);

            // Simpan data ke tabel kontrak_kerja
            KontrakKerjaModel::create([
                'id_karyawan' => $karyawan->id,
                'jenis_kontrak' => null,
                'status_kontrak_lanjutan' => 0,
                'tanggal_awal_kontrak_lanjutan' => null,
                'tanggal_akhir_kontrak_lanjutan' => null,
            ]);

            DB::commit();

            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $karyawan = KaryawanModel::findOrFail($id);

        return view('pages.karyawan.edit', [
            'title'      => 'Edit Karyawan',
            'breadcome'  => 'Edit Data Karyawan',
            'karyawan'   => $karyawan
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'sbu' => 'nullable|string|max:255',
            'bagian' => 'nullable|string|max:255',
            'status_karyawan' => 'required|in:aktif,nonaktif',
            'mcu_terakhir' => 'nullable|date',
            'catatan_mcu' => 'nullable|string',
            'catatan_penting_tanggal' => 'nullable|date',
            'catatan_penting_kasus' => 'nullable|string|max:255',
            'catatan_penting_keterangan' => 'nullable|string',
            'emergency_call_nama' => 'nullable|string|max:255',
            'emergency_call_no_telpon' => 'nullable|string|max:20',
            'no_telepon' => 'nullable|string|max:20',
            'alamat_rumah' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'pendidikan' => 'nullable|string|max:255',
            'status_perkawinan' => 'required|in:Belum Menikah,Menikah',

            // Tambahan data baru
            'dept' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'tanggal_masuk' => 'nullable|date',
            'no_npwp' => 'nullable|string|max:30',
            'no_bpjs_kesehatan' => 'nullable|string|max:30',
            'no_bpjs_ketenagakerjaan' => 'nullable|string|max:30',
            'bank_account' => 'nullable|string|max:100',
            'no_bank' => 'nullable|string|max:30',
            'no_sim' => 'nullable|string|max:30',
            'expired_sim' => 'nullable|date',
            'no_simper' => 'nullable|string|max:30',
            'expired_simper' => 'nullable|date',
        ]);

        $karyawan = KaryawanModel::findOrFail($id);

        $karyawan->update([
            'nik' => $request->nik,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'sbu' => $request->sbu,
            'bagian' => $request->bagian,
            'status_karyawan' => $request->status_karyawan,
            'mcu_terakhir' => $request->mcu_terakhir,
            'catatan_mcu' => $request->catatan_mcu,
            'catatan_penting_tanggal' => $request->catatan_penting_tanggal,
            'catatan_penting_kasus' => $request->catatan_penting_kasus,
            'catatan_penting_keterangan' => $request->catatan_penting_keterangan,
            'emergency_call_nama' => $request->emergency_call_nama,
            'emergency_call_no_telpon' => $request->emergency_call_no_telpon,
            'no_telepon' => $request->no_telepon,
            'alamat_rumah' => $request->alamat_rumah,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'status_perkawinan' => $request->status_perkawinan,

            // Tambahan data baru
            'dept' => $request->dept,
            'location' => $request->location,
            'tanggal_masuk' => $request->tanggal_masuk,
            'no_npwp' => $request->no_npwp,
            'no_bpjs_kesehatan' => $request->no_bpjs_kesehatan,
            'no_bpjs_ketenagakerjaan' => $request->no_bpjs_ketenagakerjaan,
            'bank_account' => $request->bank_account,
            'no_bank' => $request->no_bank,
            'no_sim' => $request->no_sim,
            'expired_sim' => $request->expired_sim,
            'no_simper' => $request->no_simper,
            'expired_simper' => $request->expired_simper,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }


    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            // Ambil data karyawan berdasarkan ID
            $karyawan = KaryawanModel::findOrFail($id);

            // Hapus user yang terkait
            if ($karyawan->user) {
                $karyawan->user->delete();
            }

            // Hapus data karyawan
            $karyawan->delete();

            DB::commit();
            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
