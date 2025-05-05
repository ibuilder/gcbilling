php
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payapps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('application_number');
            $table->date('billing_period_start');
            $table->date('billing_period_end');
            $table->decimal('total_work_completed', 10, 2);
            $table->decimal('total_materials_stored', 10, 2);
            $table->decimal('retainage_percentage', 5, 2);
            $table->date('application_date');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payapps');
    }
};