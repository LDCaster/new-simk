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
        Schema::create('log_resignasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resignasi')->nullable();
            $table->unsignedBigInteger('id_karyawan');
            $table->string('tanggal_keluar');
            $table->string('keterangan_keluar');
            $table->string('aksi'); // update atau delete
            $table->timestamps();

            $table->foreign('id_resignasi')->references('id')->on('resignasi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_resignasi');
    }
};
