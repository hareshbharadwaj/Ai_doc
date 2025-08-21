<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
   {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                                      // user_id
            $table->string('google_id')->nullable();             // Google ID
            $table->string('name');                            // Name
            $table->string('email')->unique();     
            $table->string('password')->nullable();            // Email
            $table->timestamp('email_verified_at')->nullable();      // Email verification timestamp
            $table->timestamp('last_login')->nullable();       // Last login time
            $table->timestamps();                              // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
