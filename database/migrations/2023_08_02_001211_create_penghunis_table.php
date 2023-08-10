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
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('no_kamar');
            // $table->foreign('no_kamar')->references('no_kamar')->on('kamars');
            // $table->foreignId('kamar_id')->constrained(
            //     table: 'kamars', indexName: 'kamar_id'
            // );
            // $table->string('name');
            // $table->integer('jumlah_penghuni');
            // $table->string('penjamin');
            $table->foreignId('kamar_id');
            $table->string('nama_penghuni');
            $table->string('address');
            $table->string('penjamin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghunis');
    }
};
