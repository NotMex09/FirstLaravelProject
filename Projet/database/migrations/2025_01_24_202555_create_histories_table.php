<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('article_id')->constrained()->onDelete('cascade'); // Foreign key to articles table
            $table->timestamp('viewed_at')->useCurrent(); // Timestamp of when the article was viewed
            $table->timestamps(); // Adds `created_at` and `updated_at` columns
            // Add indexes
    $table->index('user_id');
    $table->index('article_id');
    $table->index('viewed_at');});
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
