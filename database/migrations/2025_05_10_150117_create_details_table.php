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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->foreignId('colour_id')->constrained('colours')->onDelete('cascade')->nullable();
            $table->foreignId('size_id')->constrained('sizes')->onDelete('cascade')->nullable();
            $table->string('detail_image')->nullable();
            $table->integer('detail_price')->nullable();
            $table->integer('detail_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
