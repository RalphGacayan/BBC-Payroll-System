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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->date('date');
            $table->string('unit');
            $table->string('item_name');
            $table->string('model');
            $table->string('image');
            $table->string('serial_number');
            $table->enum('status', ['damaged','used', 'spare']);
            $table->enum('company', ['asmi', 'tibsi', 'cpn']);
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
