<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email',191)->unique();
            $table->string('password');
            $table->string('alamat',5000);
            $table->string('image');
            $table->bigInteger('kontak');
            $table->string('deskripsi',5000);
            $table->integer('gunung_id')->unsigned();
            $table->foreign('gunung_id')->references('id')->on('gunungs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('jalur_id')->unsigned();
            $table->foreign('jalur_id')->references('id')->on('jalurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('camps');
    }
}
