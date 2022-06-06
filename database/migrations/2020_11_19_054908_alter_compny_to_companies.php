<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompnyToCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string( 'RegisteredName' )->nullable()->change();
            $table->string( 'Description' )->nullable()->change();
            $table->string( 'Address' )->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string( 'RegisteredName' )->nullable()->change();
            $table->string( 'Description' )->nullable()->change();
            $table->string( 'Address' )->nullable()->change();
        });
    }
}
