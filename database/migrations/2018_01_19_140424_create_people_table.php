<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            /*
             Es necesario especificar el motor de almacenamiento
             de las tablas como InnoDB para poder tener FKs.
             Es posible tambien hacerlo desde alguna consolaMySQL,
             pero es mejor desde la migración ya que asi es mas 
             sencillo levantar luego la aplicación en su totalidad y que funcione
            */
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('last_name', 100);
            $table->string('first_name', 100);
            $table->integer('dni')->unique();
            $table->timestamp('birthdate');
            $table->binary('picture')->nullable();
            $table->string('address', 100);

            $table->integer('town_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
