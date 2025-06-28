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
        Schema::create('log_kontrak_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kontrak_kerja')->nullable();
            $table->unsignedBigInteger('id_karyawan');
            $table->string('jenis_kontrak')->nullable();
            $table->string('status_kontrak_lanjutan')->nullable();
            $table->date('tanggal_awal_kontrak_lanjutan')->nullable();
            $table->date('tanggal_akhir_kontrak_lanjutan')->nullable();
            $table->string('aksi'); // update atau delete
            $table->timestamps();

            $table->foreign('id_kontrak_kerja')->references('id')->on('kontrak_kerja')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_kontrak_kerja');
    }
};
