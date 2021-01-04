<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kets', function (Blueprint $table) {
            $table->bigInteger('k1')->unsigned();//ipk
            $table->bigInteger('k2')->unsigned();//sktm
            $table->string('kep');//lebih penting
            $table->foreign('k1')->references('id_kri')->on('kris')->onDelete('cascade');
            $table->foreign('k2')->references('id_kri')->on('kris')->onDelete('cascade');
            $table->foreign('kep')->references('nm_kep')->on('keps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kets');
    }
}
