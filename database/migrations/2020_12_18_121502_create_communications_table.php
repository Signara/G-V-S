<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'Visitor' );
            $table->bigInteger( 'Company' );
            $table->bigInteger( 'CompanyUser' );
            $table->string( 'ChatID' );
            $table->string( 'Type' );
            $table->string( 'Message' );
            $table->string( 'CreatedAt' );
            $table->bigInteger( 'CreatedBy' );
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
        Schema::dropIfExists('communications');
    }
}
