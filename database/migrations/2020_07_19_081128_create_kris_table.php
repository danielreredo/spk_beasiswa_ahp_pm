<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kris', function (Blueprint $table) {
            $table->id('id_kri');
            $table->string('nm_kri');
            $table->bigInteger('fac')->unsigned();
            $table->foreign('fac')->references('id_fac')->on('facs')->onDelete('cascade');
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
        Schema::dropIfExists('kris');
    }
}
