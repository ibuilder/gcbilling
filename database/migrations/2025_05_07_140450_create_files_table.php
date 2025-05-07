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
        Schema::create('files', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('original_name'); // Original file name
            $table->string('stored_name'); // Stored file name (e.g., unique hash)
            $table->string('path'); // Path to the stored file
            $table->string('mime_type'); // Mime type of the file
            $table->unsignedBigInteger('size'); // File size in bytes
            $table->unsignedBigInteger('uploaded_by'); // User ID of the uploader
            $table->foreign('uploaded_by')->references('id')->on('users'); // Foreign key constraint
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
