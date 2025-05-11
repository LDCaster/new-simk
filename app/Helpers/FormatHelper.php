<?php

namespace App\Helpers;

class FormatHelper
{
    /**
     * Format role agar beberapa tetap huruf besar dan lainnya hanya kapital di awal.
     *
     * @param string $role
     * @return string
     */
    public static function formatRole($role)
    {
        $uppercaseRoles = ['PJO', 'HRD']; // Daftar role yang tetap huruf besar
        return in_array(strtoupper($role), $uppercaseRoles)
            ? strtoupper($role)
            : ucfirst(strtolower($role));
    }

    public static function getRoleClass($role)
    {
        $roleClasses = [
            'SUPER ADMIN' => 'btn-danger', // Merah
            'HRD' => 'btn-primary', // Biru
            'PENGAWAS' => 'btn-warning text-dark', // Kuning
            'PJO' => 'btn-info', // Biru muda
            'KARYAWAN' => 'btn-success', // Hijau
        ];

        return $roleClasses[strtoupper($role)] ?? 'bg-secondary'; // Default abu-abu
    }
}
