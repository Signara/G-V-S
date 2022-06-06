<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('CommonName');
            $table->string('RegisteredName');
            $table->string('Email');
            $table->integer('Phone')->unique();
            $table->string('Website');
            $table->string('Description');
            $table->string('Address');
            $table->string('Logo');
            $table->string('Sectors');
            $table->string('Categories');
            $table->string('CompanyAdminUserIDs');
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
        Schema::dropIfExists('companies');
    }
}
