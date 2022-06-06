<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPxToLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('layouts', function (Blueprint $table) {
            $table->float('PX')->default('0');
            $table->float('PY')->default('0');
            $table->float('PZ')->default('0');
            $table->float('RX')->default('0');
            $table->float('RY')->default('0');
            $table->float('RZ')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('layouts', function (Blueprint $table) {
            $table->dropColumn('PX')->default('0');
            $table->dropColumn('PY')->default('0');
            $table->dropColumn('PZ')->default('0');
            $table->dropColumn('RX')->default('0');
            $table->dropColumn('RY')->default('0');
            $table->dropColumn('RZ')->default('0');
        });
    }
}
