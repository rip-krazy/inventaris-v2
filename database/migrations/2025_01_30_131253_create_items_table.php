<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruang_id')->constrained('ruangs')->onDelete('cascade');
            $table->string('name');
            $table->string('code')->unique();
            $table->enum('condition', ['Baik', 'Rusak'])->default('Baik');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}