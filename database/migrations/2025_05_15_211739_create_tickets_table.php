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
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('admin_id', 20); // Assuming user_id is a string like 'R001'

            $table->foreign('admin_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->date('ticket_date')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('total_cost')->nullable();
            $table->integer('total_profit')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
