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
        Schema::create('produsens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produsen');
            $table->string('alamat');
            $table->string('ket_bahan');
            $table->unsignedBigInteger('kec_id');
            $table->timestamps();

            $table->foreign('kec_id')->references('id')->on('kecamatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produsens');
    }
};
