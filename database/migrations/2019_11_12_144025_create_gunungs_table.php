<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGunungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gunungs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nama');
            $table->integer('tinggi');
            $table->string('propinsi');
            $table->string('kota');
            $table->string('deskripsi',5000);
            $table->string('image');
            $table->string('status');
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
        Schema::dropIfExists('gunungs');
    }
}
