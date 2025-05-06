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
        Schema::create('application_for_payment_line_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_for_payment_id');
            $table->unsignedBigInteger('schedule_of_value_id');
            $table->decimal('previous_work_completed', 10, 2)->default(0.00);
            $table->decimal('previous_stored', 10, 2)->default(0.00);
            $table->decimal('current_work_completed', 10, 2)->default(0.00);
            $table->decimal('current_stored', 10, 2)->default(0.00);
            $table->foreign('application_for_payment_id')->references('id')->on('payapps')->onDelete('cascade');
            $table->foreign('schedule_of_value_id')->references('id')->on('schedule_of_values')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_for_payment_line_items');
    }
};
