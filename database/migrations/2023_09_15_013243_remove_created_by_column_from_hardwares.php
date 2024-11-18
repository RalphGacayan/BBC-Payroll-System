<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCreatedByColumnFromHardwares extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hardwares', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('hardwares', function (Blueprint $table) {
            $table->string('created_by');
        });
    }
}
