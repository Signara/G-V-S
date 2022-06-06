<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'ExhibtionID' )->null();
            $table->bigInteger( 'HallID' )->null();
            $table->bigInteger( 'CompanyID' )->null();
            $table->bigInteger( 'ModelID' )->null();
            $table->string( 'Colour1' )->nullable();
            $table->string( 'Colour2' )->nullable();
            $table->string( 'Banner1' )->nullable();
            $table->string( 'Banner2' )->nullable();
            $table->string( 'Banner3' )->nullable();
            $table->string( 'Banner4' )->nullable();
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
        Schema::dropIfExists('layouts');
    }
}
