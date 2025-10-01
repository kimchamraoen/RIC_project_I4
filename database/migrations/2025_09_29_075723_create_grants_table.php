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
        Schema::create('grants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('award_type')->nullable();
            $table->string('title')->nullable();
            $table->string('month_start_date')->nullable();
            $table->string('year_start_date')->nullable();
            $table->string('month_end_date')->nullable();
            $table->string('year_end_date')->nullable();
            $table->string('currency')->nullable();
            $table->string('amount')->nullable();
            $table->string('funding_agency')->nullable();
            $table->string('grant_reference')->nullable();
            $table->string('principal_investigators')->nullable();
            $table->string('co_investigators')->nullable();
            $table->string('institution')->nullable();
            $table->string('secondary_institutions')->nullable();
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grants');
    }
};
