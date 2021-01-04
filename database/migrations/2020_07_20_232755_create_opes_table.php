<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opes', function (Blueprint $table) {
            $table->id('id_ope');
            $table->string('nm_ope');
            $table->string('nidn');
            $table->enum('jk_ope', ['Laki-laki', 'Perempuan']);
            $table->bigInteger('pro')->unsigned();
            $table->bigInteger('user')->unsigned();
            $table->foreign('pro')->references('id_pro')->on('pros')->onDelete('cascade');
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('opes');
    }
}
