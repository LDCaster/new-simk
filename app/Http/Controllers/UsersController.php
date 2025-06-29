<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        // Ambil semua data karyawan dengan relasi ke tabel resign
        $users = User::with('karyawan')->get();

        return view('pages.users.index', [
            'title'      => 'Data Karyawan',
            'breadcome'  => 'Karyawan',
            'users'   => $users // Kirim data ke view
        ]);
    }

    public function edit($id)
    {
        $user = User::with('karyawan')->findOrFail($id);

        return view('pages.users.edit', [
            'title'     => 'Edit User',
            'breadcome' => 'Users',
            'user'      => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $id,
            'role'   => 'required|in:super admin,hrd,pengawas,pjo,karyawan',
            'status' => 'required|in:aktif,tidak aktif,berhenti',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'role'   => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }
}
