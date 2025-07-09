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
        Schema::create('profil', function (Blueprint $table) {
            $table->id();   
            $table->string('nama');
            $table->string('namax');
            $table->string('alamat');
            $table->string('telp');
            $table->string('kota');
            $table->string('propinsi');
            $table->string('email');
            $table->string('website');
            $table->string('norm');
            $table->string('noreg');
            $table->string('tindakan');
            $table->string('laborat');
            $table->string('radiologi');
            $table->string('operasi');
            $table->string('hemodialisa');
            $table->string('obat');
            $table->string('obat2');
            $table->string('resep');
            $table->string('beli');
            $table->string('mutasi');
            $table->string('bhp');
            $table->string('retur1');
            $table->string('retur2');
            $table->string('expired');
            $table->string('nobayi');
            $table->string('bulan');
            $table->string('nokwitansi');
            $table->string('tahun');
            $table->string('nokwitansiglobal');
            $table->integer('nodp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};
