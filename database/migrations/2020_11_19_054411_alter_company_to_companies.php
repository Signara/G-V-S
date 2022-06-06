<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyToCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string( 'RegisteredName' )->null()->change();
            $table->string( 'Description' )->null()->change();
            $table->string( 'Address' )->null()->change();
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
            $table->string( 'RegisteredName' )->null()->change();
            $table->string( 'Description' )->null()->change();
            $table->string( 'Address' )->null()->change();
        });
    }
}
