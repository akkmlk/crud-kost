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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            // $table->integer('no_kamar')->primary('no_kamar');
            // $table->string('nama_penghuni');
            // $table->string('luas_kamar');
            // $table->enum('status', ['terisi', 'kosong'])->default('kosong');
            // kecil, sedang, besar;
            $table->string('jenis_kamar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
