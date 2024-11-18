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
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->string('po_number');
            $table->string('supplier_name');
            $table->date('date');
            $table->date('delivery_date');
            $table->enum('terms_of_payment', ['CASH PAYMENTS', 'COD', '30 DAYS', '50 DAYS']);
            $table->enum('company', ['ASMI', 'TIBSI', 'CPN', 'PMCC', 'ACSFI']);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('withholding_tax', 10, 2);
            $table->decimal('grandtotal', 10, 2);
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_details');
    }
};
