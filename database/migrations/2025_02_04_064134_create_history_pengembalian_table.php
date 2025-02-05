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
        Schema::create('history_pengembalian', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama User
            $table->date('tanggal_pengembalian'); // Tanggal Pengembalian
            $table->string('barang_tempat'); // Nama Barang atau Tempat
            $table->string('mapel'); // Nama Mapel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_pengembalian');
    }

    
};
