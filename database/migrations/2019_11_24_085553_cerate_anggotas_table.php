<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CerateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('petualangan_id')->unsigned();
            $table->foreign('petualangan_id')->references('id')->on('petualangans');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('gunung_id')->unsigned();
            $table->foreign('gunung_id')->references('id')->on('gunungs');
            $table->integer('jalur_id')->unsigned();
            $table->foreign('jalur_id')->references('id')->on('jalurs');
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
        //
    }
}
