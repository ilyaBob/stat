<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trade_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('trade_id')->nullable(false);
            $table->unsignedBigInteger('product_id')->nullable(false);
            $table->decimal('initial_quantity');
            $table->integer('price_for_unit');
            $table->decimal('final_quantity')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trade_products');
    }
};
