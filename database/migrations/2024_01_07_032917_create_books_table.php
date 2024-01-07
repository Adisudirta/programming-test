<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable()->references('id')->on('authors')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->references('id')->on('book_categories')->onDelete('cascade');
            $table->string('title');
            $table->float('avg_ratings');
            $table->integer('voters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
