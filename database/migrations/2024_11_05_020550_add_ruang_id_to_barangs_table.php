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
        Schema::table('barangs', function (Blueprint $table) {
            $table->unsignedBigInteger('ruang_id')->nullable(); // Add foreign key column
            $table->foreign('ruang_id')->references('id')->on('ruangs')->onDelete('cascade'); // Set foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['ruang_id']); // Drop foreign key
            $table->dropColumn('ruang_id'); // Drop column
        });
    }
};
