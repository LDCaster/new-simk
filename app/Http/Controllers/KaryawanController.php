<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        // Ambil semua data karyawan dari database
        $karyawan = KaryawanModel::all();

        return view('pages.karyawan.index', [
            'title'      => 'Data Karyawan',
            'breadcome'  => 'Karyawan',
            'karyawan'   => $karyawan // Kirim data ke view
        ]);
    }
}
