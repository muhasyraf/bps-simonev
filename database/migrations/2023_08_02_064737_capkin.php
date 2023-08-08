<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('capkins', function (Blueprint $table) {
            $table->id();
            $table->integer('tw1_capkin');
            $table->integer('tw1_ra');
            $table->integer('tw2_capkin');
            $table->integer('tw2_ra');
            $table->integer('tw3_capkin');
            $table->integer('tw3_ra');
            $table->integer('tw4_capkin');
            $table->integer('tw4_ra');
            $table->string('file');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capkins');
    }
};
