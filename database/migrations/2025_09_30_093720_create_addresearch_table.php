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
        Schema::create('addresearch', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained() // default: references id on users
                  ->onDelete('cascade');
            $table->string('publication_type');
            $table->string('title');
            $table->json('authors')->nullable();
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('file_path')->nullable();
            $table->text('description');
            $table->string('file_path2')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresearch');
    }
};
