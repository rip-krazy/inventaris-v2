<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ruang_id');
            $table->string('nama_barang');
            $table->string('kode_barang')->unique();
            $table->string('kondisi_barang');
            $table->string('lokasi');
            $table->timestamps();
            
            // Foreign key constraint removed temporarily
            // Will add it after confirming ruangs table structure
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};