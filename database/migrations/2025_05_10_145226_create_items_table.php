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
        Schema::create('items', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('item_name');
            $table->string('item_slug')->unique();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->text('item_description');
            $table->integer('buying_price');
            $table->integer('selling_price');
            $table->integer('limit_stock')->default(5);
            $table->boolean('item_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
