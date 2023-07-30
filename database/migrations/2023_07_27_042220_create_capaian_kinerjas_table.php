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
        Schema::create('capaian_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pusat_id')->nullable()->constrained();
            $table->date('tanggal');
            $table->integer('tahun');
            $table->integer('triwulan');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capaian_kinerjas');
    }
};
