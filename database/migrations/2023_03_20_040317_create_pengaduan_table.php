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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id', 11);
            $table->string('nama_pengadu', 25);
            $table->date('tgl_pengaduan');
            $table->date('tgl_kejadian');
            $table->string('nik', 16);
            $table->text('isi_laporan');
            $table->string('tanggapan', 225);
            $table->string('foto', 225);
            $table->enum('akses', ['public','private']);
            $table->enum('status', ['tunggu', 'proses', 'selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
