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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key
            $table->string('nik', 20)->nullable();
            $table->string('nip', 20)->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('sbu', 100)->nullable(); // SBU
            $table->string('bagian', 100)->nullable(); // Bagian
            $table->string('dept', 100)->nullable(); // Departemen
            $table->string('location', 100)->nullable(); // Lokasi
            $table->date('tanggal_masuk')->nullable(); // Tanggal masuk kerja
            $table->enum('status_karyawan', ['aktif', 'nonaktif'])->nullable(); // Status Karyawan

            $table->date('mcu_terakhir')->nullable(); // MCU Terakhir
            $table->text('catatan_mcu')->nullable(); // Catatan dokter

            $table->date('catatan_penting_tanggal')->nullable(); // Tanggal catatan penting
            $table->string('catatan_penting_kasus', 100)->nullable(); // Kasus catatan penting
            $table->text('catatan_penting_keterangan')->nullable(); // Keterangan catatan penting

            $table->string('emergency_call_nama', 100)->nullable(); // Nama emergency call
            $table->string('emergency_call_no_telpon', 15)->nullable(); // No. Telepon emergency call

            $table->string('alamat_rumah')->nullable();
            $table->string('no_telepon', 15)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('pendidikan', 50)->nullable();
            $table->enum('status_perkawinan', ['Belum Menikah', 'Menikah'])->nullable();

            // Tambahan data lainnya
            $table->string('no_npwp', 30)->nullable();
            $table->string('no_bpjs_kesehatan', 30)->nullable();
            $table->string('no_bpjs_ketenagakerjaan', 30)->nullable();
            $table->string('bank_account', 100)->nullable(); // Nama Bank
            $table->string('no_bank', 30)->nullable(); // No Rekening
            $table->string('no_sim', 30)->nullable();
            $table->date('expired_sim')->nullable();
            $table->string('no_simper', 30)->nullable(); // Permit/SIMPER
            $table->date('expired_simper')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
