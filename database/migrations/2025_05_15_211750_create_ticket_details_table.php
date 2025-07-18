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
        Schema::create('ticket_details', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');

            $table->string('item_id');
            $table->string('item_name');
            $table->string('item_colour')->nullable();
            $table->string('item_size')->nullable();
            $table->integer('item_price');
            $table->integer('buying_price');
            $table->integer('item_quantity');
            $table->integer('subtotal');
            $table->integer('subcost');
            $table->integer('subprofit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_details');
    }
};
