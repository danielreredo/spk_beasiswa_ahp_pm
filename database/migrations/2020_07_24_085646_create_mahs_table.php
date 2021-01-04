<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahs', function (Blueprint $table) {
            $table->id('id_mah');
            $table->string('npm');
            $table->string('nm_mah');
            $table->bigInteger('pro')->unsigned();
            $table->bigInteger('per')->unsigned();
            $table->enum('jk_mah', ['Laki-laki', 'Perempuan']);
            $table->foreign('pro')->references('id_pro')->on('pros')->onDelete('cascade');
            $table->foreign('per')->references('id_per')->on('pers')->onDelete('cascade');
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
        Schema::dropIfExists('mahs');
    }
}
