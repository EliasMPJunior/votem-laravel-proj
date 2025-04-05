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
        Schema::create('credentials', function (Blueprint $table) {
            $table->uuid('external_id')->primary();
            $table->string('username')->unique();
            $table->string('password_hash');
            $table->uuid('person_id');
            $table->enum('status', ['active', 'suspended', 'revoked'])->default('active');
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
            
            $table->foreign('person_id')->references('external_id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credentials');
    }
};