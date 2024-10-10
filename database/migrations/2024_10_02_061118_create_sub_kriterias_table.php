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
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_id'); // Foreign key to kriteria
            $table->string('kode_sub_kriteria')->unique(); // Tambahkan kolom kode_sub_kriteria
            $table->string('nama_sub_kriteria');
            $table->integer('bobot_sub_kriteria');
            $table->timestamps();

            // Setup foreign key relationship
            $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kriterias');
    }
};
