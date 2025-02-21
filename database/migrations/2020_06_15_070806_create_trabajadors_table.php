<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->increments('trabajador_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('age');
            $table->string('cc');
            $table->string('email');
            $table->string('password');
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('empresa_id')->on('empresas');
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
        Schema::dropIfExists('trabajadors');
    }
}
