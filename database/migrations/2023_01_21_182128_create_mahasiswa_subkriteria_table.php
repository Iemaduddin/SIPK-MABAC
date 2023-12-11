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
        Schema::create('mahasiswa_subkriteria', function (Blueprint $table) {
            $table->increments('id');
            // $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->integer('mahasiswa_id')->unsigned();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            // $table->foreignId('subkriteria_id')->constrained()->onDelete('cascade');
            $table->integer('subkriteria_id')->unsigned();
            $table->foreign('subkriteria_id')->references('id')->on('subkriterias')->onDelete('cascade');
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
        Schema::dropIfExists('mahasiswa_subkriteria');
    }
};
