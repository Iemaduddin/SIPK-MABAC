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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('email')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jk', ['pria', 'wanita'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('kampus')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('prodi')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('status_berkas', ['diterima', 'ditolak'])->nullable();
            $table->enum('status_beasiswa', ['lulus', 'tidak lulus'])->nullable();
            $table->float('hasil', 10, 10)->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
};
