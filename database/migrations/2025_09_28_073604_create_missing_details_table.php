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
        Schema::create('missing_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('institute')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('primary_affiliation_month')->nullable();
            $table->integer('primary_affiliation_year')->nullable();
            $table->string('country_region')->nullable();
            $table->string('city')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missing_details');
    }
};
