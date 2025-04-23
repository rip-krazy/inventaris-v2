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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('action');
            $table->unsignedBigInteger('admin_id');
            $table->text('notes')->nullable();
            $table->string('name');
            $table->string('mapel')->nullable();
            $table->string('barang_tempat')->nullable();
            $table->string('ruang_tempat')->nullable();
            $table->date('tanggal_pengembalian');
            $table->string('status')->default('Approved');
            $table->text('alasan')->nullable();
            $table->string('type')->default('pengembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
