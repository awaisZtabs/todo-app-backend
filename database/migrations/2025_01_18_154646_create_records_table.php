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
        Schema::create('records', function (Blueprint $table) {
                $table->id();
                $table->date('date')->nullable();
                $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
                $table->foreignId('vehicle_type_id')->constrained()->onDelete('cascade');
                $table->string('color')->nullable();
                $table->string('plate_no')->nullable();
                $table->decimal('rate', 10, 2);
                $table->enum('tax_type', ['INCLUDED TAX', 'VAT']);
                $table->string('extendable')->default('no');
                $table->string('no_of_days')->nullable();
                $table->date('delivery_date')->nullable();
                $table->time('delivery_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
