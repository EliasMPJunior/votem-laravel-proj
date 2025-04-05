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
        Schema::create('candidates', function (Blueprint $table) {
            $table->uuid('external_id')->primary();
            $table->uuid('person_id');
            $table->uuid('election_id');
            $table->string('number');
            $table->text('bio')->nullable();
            $table->string('photo_url')->nullable();
            $table->timestamps();
            
            $table->foreign('person_id')->references('external_id')->on('people');
            $table->foreign('election_id')->references('external_id')->on('elections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};