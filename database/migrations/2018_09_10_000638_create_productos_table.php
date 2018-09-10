<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id')->comment('Un producto es 1 sustancia o más.');
            $table->string('nombre');
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
        Schema::dropIfExists('productos');
    }
}
