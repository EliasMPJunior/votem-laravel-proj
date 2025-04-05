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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->uuid('external_id')->primary();
            $table->uuid('actor_id');
            $table->string('action_type');
            $table->json('details')->nullable();
            $table->dateTime('timestamp');
            $table->timestamps();
            
            $table->foreign('actor_id')->references('external_id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};