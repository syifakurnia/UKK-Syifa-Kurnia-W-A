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
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->string('nik', 25);
            $table->string('name', 35);
            $table->string('email', 225);
            $table->string('username', 25);
            $table->string('password', 100);
            $table->string('telp', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masyarakat_tabe');
    }
};
