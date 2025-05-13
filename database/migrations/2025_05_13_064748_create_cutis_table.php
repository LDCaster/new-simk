<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawan')->onDelete('cascade');
            $table->date('tanggal_cuti');
            $table->string('alasan')->nullable();
            $table->enum('status_pengajuan', ['DIAJUKAN', 'DISETUJUI_PENGAWAS', 'DISETUJUI_HRD', 'DISETUJUI_PJO', 'DITOLAK'])->default('DIAJUKAN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
