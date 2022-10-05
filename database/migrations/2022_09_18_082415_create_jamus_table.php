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
        Schema::create('jamus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_id');
            $table->string('persediaan');
            $table->string('kemasan');
            $table->unsignedBigInteger('produsen_id');
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('detailjamus');
            $table->foreign('produsen_id')->references('id')->on('produsens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jamus');
    }
};
