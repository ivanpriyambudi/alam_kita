<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalurs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('gunung_id')->unsigned();
            $table->foreign('gunung_id')->references('id')->on('gunungs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nama');
            $table->integer('estimasi');
            $table->integer('tarif');
            $table->string('lokasi');
            $table->string('kontak');
            $table->string('akses',5000);
            $table->string('peta');
            $table->string('image');
            $table->string('status');
            $table->string('deskripsi',5000);
            $table->integer('status_camp');
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
        Schema::dropIfExists('jalurs');
    }
}
