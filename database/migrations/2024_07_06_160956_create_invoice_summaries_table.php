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
        Schema::create('invoice_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('doctor_id');
            $table->string('admission_date')->nullable();
            $table->string('discharge_date')->nullable();
            $table->string('bed')->nullable();
            $table->string('invoice_number')->nullable();
            $table->integer('total')->default(0);
            $table->integer('initial_deposit')->default(0);
            $table->integer('outstanding_balance')->default(0);
            $table->integer('days')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_summaries');
    }
};
