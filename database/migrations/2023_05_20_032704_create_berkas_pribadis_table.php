<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_pribadis', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('mahasiswa_id')->constrained();
            $table->integer('mahasiswa_id')->unsigned();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->string('surat_permohonan');
            $table->string('surat_keterangan_selesai_proposal');
            $table->string('rekening_aktif');
            $table->string('ktp');
            $table->string('kk');
            $table->string('ktm');
            $table->string('transkip_nilai');
            $table->string('pernyataan_asn')->nullable();
            $table->string('surat_aktif_kuliah');
            $table->string('surat_keterangan_bebas_beasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_pribadis');
    }
};
