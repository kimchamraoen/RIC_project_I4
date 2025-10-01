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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('institution')->nullable();
            $table->string('start_month')->nullable();
            $table->integer('start_year')->nullable();
            $table->string('end_month')->nullable();
            $table->integer('end_year')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('degree')->nullable();
            $table->string('country_region')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
