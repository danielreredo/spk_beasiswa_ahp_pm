<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkorKrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skor_kris', function (Blueprint $table) {
            $table->id('id_skor_kri');
            $table->bigInteger('kri')->unsigned();
            $table->bigInteger('mah')->unsigned();
            $table->integer('skor');
            $table->foreign('kri')->references('id_kri')->on('kris')->onDelete('cascade');
            $table->foreign('mah')->references('id_mah')->on('mahs')->onDelete('cascade');
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
        Schema::dropIfExists('skor_kris');
    }
}
