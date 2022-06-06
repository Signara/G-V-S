<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionalMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional_materials', function (Blueprint $table) {
            $table->id();
            $table->string( 'Title' )->nullable();
            $table->bigInteger( 'Company' );
            $table->string( 'Type' );
            $table->string( 'File' );
            $table->string( 'Thumbnail' )->nullable();
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
        Schema::dropIfExists('promotional_materials');
    }
}
