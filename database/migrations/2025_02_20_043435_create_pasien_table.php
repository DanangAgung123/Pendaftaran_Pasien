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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('norm');
            $table->string('normx');
            $table->string('nama');
            $table->string('sapaan');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('propinsi');
            $table->string('rt');
            $table->string('rw');
            $table->string('kodepos');
            $table->string('pekerjaan');
            $table->string('tmplahir');
            $table->string('tgllahir');
            $table->string('kelamin');
            $table->string('statuskawin');
            $table->string('pendidikan');
            $table->string('agama');
            $table->string('suku');
            $table->string('normlama');
            $table->string('barulama');
            $table->string('notelp');
            $table->string('noktp');
            $table->string('nokk');
            $table->string('umur');
            $table->string('namapasangan');
            $table->string('pekerjaanpasangan');
            $table->string('namabapak');
            $table->string('namaibuk');
            $table->string('nohp');
            $table->string('kk');
            $table->string('noka');
            $table->string('noasuransi');
            $table->string('tgldatang');
            $table->string('namakeluarga');
            $table->string('notelpkeluarga');
            $table->string('rfid');
            $table->string('alamatskr');
            $table->string('kelurahanskr');
            $table->string('kecamatanskr');
            $table->string('kabupatenskr');
            $table->string('propinsiskr');
            $table->string('rtskr');
            $table->string('rwskr');
            $table->string('pekerjaanbapak');
            $table->string('pekerjaanibu');
            $table->string('bahasa');
            $table->string('penerjemah');
            $table->string('infodari');
            $table->string('waktubuat');
            $table->string('statusDaftar');
            $table->string('idPengguna');
            $table->string('KataSandi');
            $table->string('cetakKartu');
            $table->string('haricetakKartu');
            $table->string('tglcetakKartu');
            $table->string('ststusKib');
            $table->string('stwarnaKib');
            $table->string('id_ihs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
