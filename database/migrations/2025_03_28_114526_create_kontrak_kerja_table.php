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
        Schema::create('kontrak_kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('karyawan')->onDelete('cascade');
            $table->enum('jenis_kontrak', ['PKWT', 'PKWTT', 'PKWT/PKWTT'])->nullable();
            $table->integer('status_kontrak_lanjutan')->nullable();
            $table->date('tanggal_awal_kontrak_lanjutan')->nullable();
            $table->date('tanggal_akhir_kontrak_lanjutan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak_kerja');
    }
};
