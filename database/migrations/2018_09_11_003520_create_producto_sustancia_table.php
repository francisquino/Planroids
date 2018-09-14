<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoSustanciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_sustancia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->integer('sustancia_id')->unsigned();
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
        Schema::dropIfExists('producto_sustancia');
    }
}
