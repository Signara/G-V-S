<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string( 'Name' )->nullable();
            $table->string( 'Description' )->nullable();
            $table->integer( 'Cost' )->default('0');
            $table->bigInteger( 'ParticipantType' )->nullable();
            $table->string( 'Stalls' )->nullable();
            $table->string( 'Banners' )->nullable();
            $table->string( 'OtherModels' )->nullable();
            $table->string( 'WebPage' )->nullable();
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
        Schema::dropIfExists('packages');
    }
}
