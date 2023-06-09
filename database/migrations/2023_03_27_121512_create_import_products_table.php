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
        Schema::create('import_products', function (Blueprint $table) {
            $table->uuid('import_id');
            $table->foreign('import_id')->references('id')->on('imports');
            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('amount');
            $table->float('price');
            $table->primary(['import_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_products');
    }
};
