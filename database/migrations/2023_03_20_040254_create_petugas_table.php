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
        Schema::create('petugas', function (Blueprint $table) {
            $table->integer('id_petugas', 11);
            $table->string('name', 35);
            $table->string('username', 25);
            $table->string('email', 225);
            $table->string('password', 100);
            $table->string('telp', 13);
            $table->enum('level',['admin','petugas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
