<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelo', 40);
            $table->integer('marca_id')->unsigned();

            // define uma chave estrangeira que se relaciona com marcas
            $table->foreign('marca_id')
                  ->references('id')->on('marcas')
                  ->onDelete('restrict');            

            $table->string('cor', 30);
            $table->smallInteger('ano');
            $table->decimal('preco', 10, 2);

            $table->enum('combustivel', ['A','D','F','G']);
                  
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
        Schema::dropIfExists('carros');
    }
}
