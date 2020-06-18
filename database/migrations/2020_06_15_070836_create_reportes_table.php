<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->increments('reporteTrabajador_id')->unsigned();
            $table->unsignedInteger('trabajador_id');
            $table->unsignedInteger('sintoma_id');
            $table->string('descripcion');
            $table->string('temperatura');

            $table->foreign('trabajador_id')->references('trabajador_id')->on('trabajadors');
            $table->foreign('sintoma_id')->references('sintoma_id')->on('sintomas');
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
        Schema::dropIfExists('reportes');
    }
}
