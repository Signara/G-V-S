<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->id();
            $table->string( 'Image' )->nullable();
            $table->string( 'Banner' )->nullable();
            $table->string( 'Name' )->nullable();
            $table->string( 'Description' )->nullable();
            $table->string( 'Sector' )->nullable();
            $table->string( 'Category' )->nullable();
            $table->string( 'Tag' )->nullable();
            $table->string( 'StartDate' )->nullable();
            $table->string( 'StartTime' )->nullable();
            $table->string( 'EndDate' )->nullable();
            $table->string( 'EndTime' )->nullable();
            $table->string( 'Packages' )->nullable();
            $table->string( 'Organiser' )->nullable();
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
        Schema::dropIfExists('exhibitions');
    }
}
