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
        Schema::create('detailruangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruang_id')->constrained('ruangs'); // This should be here for the foreign key
            $table->string('nama_barang');
            $table->string('kode_barang')->unique();
            $table->string('kondisi_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailruangs');
    }
};
