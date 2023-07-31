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
        Schema::create('perjanjian_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pusat_id')->nullable()->constrained();
            $table->date('tanggal');
            $table->integer('tahun');
            $table->integer('review');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjanjian_kinerjas');
    }
};
