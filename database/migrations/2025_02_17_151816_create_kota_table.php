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
        Schema::create('kota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode');
            $table->string('propinsi');
            $table->unsignedBigInteger('kdKotakab');
            $table->string('kabupaten');
            $table->unsignedBigInteger('kdKec');
            $table->string('kecamatan');
            $table->unsignedBigInteger('kdDes');
            $table->string('kelurahan');
            $table->string('kodePos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kota');
    }
};
