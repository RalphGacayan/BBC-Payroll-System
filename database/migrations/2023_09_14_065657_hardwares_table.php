<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hardwares', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->date('date');
            $table->string('unit');
            $table->string('asset_name');
            $table->string('model');
            $table->string('image');
            $table->string('serial_number');
            $table->enum('status', ['DAMAGED','USED', 'SPARE']);
            $table->enum('company', ['ASMI', 'TIBSI', 'CPN', 'PMCC', 'ACSFI']);
            $table->string('manufacturer');
            $table->string('remarks');
            $table->string('assigned_to');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardwares');
    }
};
