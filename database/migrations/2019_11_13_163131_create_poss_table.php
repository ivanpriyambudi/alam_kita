<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePossTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gunung_id')->unsigned();
            $table->foreign('gunung_id')->references('id')->on('gunungs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('jalur_id')->unsigned();
            $table->foreign('jalur_id')->references('id')->on('jalurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nama');
            $table->integer('no_pos');
            $table->integer('estimasi');
            $table->string('deskripsi',5000);
            $table->string('image');
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
        Schema::dropIfExists('poss');
    }
}
