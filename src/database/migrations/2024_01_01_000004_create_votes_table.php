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
        Schema::create('votes', function (Blueprint $table) {
            $table->uuid('external_id')->primary();
            $table->uuid('election_id');
            $table->uuid('voter_id');
            $table->uuid('candidate_id')->nullable();
            $table->boolean('is_anonymous')->default(true);
            $table->boolean('was_validated')->default(true);
            $table->string('hash');
            $table->dateTime('timestamp');
            $table->timestamps();
            
            $table->foreign('election_id')->references('external_id')->on('elections');
            $table->foreign('voter_id')->references('external_id')->on('people');
            $table->foreign('candidate_id')->references('external_id')->on('candidates')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};