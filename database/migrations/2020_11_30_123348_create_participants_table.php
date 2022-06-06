<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'Exhibition' )->nullable();
            $table->bigInteger( 'Company' )->nullable();
            $table->bigInteger( 'ParticipantType' )->nullable();
            $table->bigInteger( 'Package' )->nullable();
            $table->string( 'StartDate' )->nullable();
            $table->string( 'StartTime' )->nullable();
            $table->string( 'EndDate' )->nullable();
            $table->string( 'EndTime' )->nullable();
            $table->string( 'Admins' )->nullable();
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
        Schema::dropIfExists('participants');
    }
}
