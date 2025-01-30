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
            Schema::create('conversations', function (Blueprint $table) {
                $table->id(); // Auto-incrementing primary key
                $table->foreignId('article_id')->constrained()->onDelete('cascade'); // Foreign key to articles table
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
                $table->foreignId('theme_id')->constrained()->onDelete('cascade'); // Foreign key to users table
                $table->text('message'); // Chat message content
                $table->timestamps(); // Created_at and updated_at timestamps
                // Add indexes
    $table->index('article_id');
    $table->index('user_id');});
        }

        public function down()
        {
            Schema::dropIfExists('conversations');
        }
        };
