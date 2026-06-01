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
        Schema::create('documents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->uuid('upload_id')->unique();
            $table->string('title');
            $table->text('original_file_name');
            $table->integer('file_size');
            $table->string('mime_type', 100);
            $table->text('temporary_path')->nullable();
            $table->text('file_path')->nullable();
            $table->integer('total_chunks')->nullable();
            $table->integer('uploaded_chunks')->default(0);
            $table->enum('status', [
                'uploading',
                'processing',
                'completed',
                'failed',
            ])->default('uploading');
            $table->text('failure_reason')->nullable();
            $table->timestampTz('uploaded_at')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
