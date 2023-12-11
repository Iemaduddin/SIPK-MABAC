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
        Schema::create('kriterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->string('kriteria');
            $table->enum('jenis', ['benefit', 'cost']);
            $table->float('bobot', 8, 2);
            $table->float('min', 8, 2)->nullable();
            $table->float('max', 8, 2)->nullable();
            $table->float('batasan', 8, 3)->nullable();
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
        Schema::dropIfExists('kriterias');
    }
};
