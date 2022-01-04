<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquiler', function (Blueprint $table) {
            $table->id();
            $table->string('fecha',25);
            $table->string('fechaDesde',25);
            $table->string('fechaHasta',25);
            $table->double('costoTotal');
            $table->bigInteger('id_inquilino')->unsigned();
            $table->foreign('id_inquilino')->references('id')->on('inquilino')
            ->onDelete('cascade');
            $table->unsignedBigInteger('id_local')->nullable()->default(null);
            $table->foreign('id_local')->references('id')->on('local')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquiler');
    }
}
