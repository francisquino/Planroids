<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSustanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sustancias', function (Blueprint $table) {
            $table->increments('id')->comment('Usados por la tabla Productos. Un producto es 1 sustancia o más. Ej: Producto Sustanon compuesto por varias sustancias.');
            $table->string('nombre');
            $table->unsignedDecimal('vidaMedia',10,2);
            $table->timestamps();

            $table->engine = 'InnoDB';              //Specify the table storage engine (MySQL): InnoDB o MyISAM.
            $table->charset = 'utf8';               //Specify a default character set for the table (MySQL).
            $table->collation = 'utf8_spanish_ci';  //Specify a default collation for the table (MySQL).
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sustancias');
    }
}
