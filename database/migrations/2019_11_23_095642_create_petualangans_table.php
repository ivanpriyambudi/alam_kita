<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetualangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petualangans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gunung_id')->unsigned();
            $table->foreign('gunung_id')->references('id')->on('gunungs');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('jalur_id')->unsigned();
            $table->foreign('jalur_id')->references('id')->on('jalurs');
            $table->string('tempat');
            $table->string('deskripsi');
            $table->string('waktu');
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
        Schema::dropIfExists('petualangans');
    }
}
