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
        Schema::create('imports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('total');
            $table->uuid('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->uuid('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->primary(['admin_id', 'supplier_id']);
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imports');
    }
};
