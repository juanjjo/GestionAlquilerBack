<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usuario',25)->unique();
            $table->string('password',100);
            $table->boolean('activo')->default(true);
            $table->string('rol',25);
            $table->bigInteger('id_perfil')->unsigned();
            $table->foreign('id_perfil')->references('id')->on('perfil')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //
    {
        Schema::dropIfExists('users');
    }
}
