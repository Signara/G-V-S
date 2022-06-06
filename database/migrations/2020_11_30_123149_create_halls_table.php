<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'Exhibition' )->nullable();
            $table->integer( 'SrNo' )->nullable();
            $table->string( 'Name' )->nullable();
            $table->string( 'Description' )->nullable();
            $table->string( 'StartDate' )->nullable();
            $table->string( 'StartTime' )->nullable();
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
        Schema::dropIfExists('halls');
    }
}
