<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string( 'Image' )->nullable();
            $table->string( 'Name' )->nullable();
            $table->string( 'Description' )->nullable();
            $table->integer('xValue')->default('0');
            $table->integer('yValue')->default('0');
            $table->integer('zValue')->default('0');
            $table->string( 'Model' )->nullable();
            $table->string( 'Type' )->nullable();
            $table->tinyInteger('Status')->default('1');
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
        Schema::dropIfExists('models');
    }
}
