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
    Schema::create('articles', function (Blueprint $table) {
        $table->id(); // Auto-incrementing primary key
        $table->string('title'); // Article title
        $table->text('content'); // Article content
        $table->foreignId('theme_id')->constrained()->onDelete('cascade'); // Foreign key to themes table
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table (author)
        $table->enum('status', ['pending', 'approved', 'rejected', 'published'])->default('pending'); // Article status
        $table->string('image')->nullable(); // Adding image column
        $table->timestamps(); // Created_at and updated_at timestamps
        // Add indexes
    $table->index('theme_id');
    $table->index('user_id');
    $table->index('status'); });
}

public function down()
{
    Schema::dropIfExists('articles');
}
};
