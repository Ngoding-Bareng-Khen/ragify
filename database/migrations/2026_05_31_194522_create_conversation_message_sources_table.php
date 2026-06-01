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
        Schema::create('conversation_message_sources', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('conversation_message_id')->constrained('conversation_messages')->cascadeOnDelete();
            $table->foreignUuid('document_chunk_id')->constrained('document_chunks')->cascadeOnDelete();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation_message_sources');
    }
};
