<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('template_type');          // e.g., business_proposal, invoice
            $table->string('title');                  // user-visible title
            $table->json('form_data');                // raw form payload
            $table->longText('content');              // rendered HTML snapshot (optional)
            $table->string('pdf_path')->nullable();   // storage path (public disk)
            $table->unsignedBigInteger('pdf_size')->nullable();
            $table->string('doc_number')->nullable(); // e.g., INV-2025-0001
            $table->string('user_email');
            $table->timestamps();

            $table->index('user_email');
            $table->index('template_type');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};