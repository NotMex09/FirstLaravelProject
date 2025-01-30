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
            Schema::create('ratings', function (Blueprint $table) {
                $table->id(); // Auto-incrementing primary key
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
                $table->foreignId('article_id')->constrained()->onDelete('cascade'); // Foreign key to articles table
                $table->tinyInteger('rating')->unsigned()->between(1, 5); // Rating value (1 to 5)
                $table->timestamps(); // Created_at and updated_at timestamps
               // Add indexes
    $table->index('user_id');
    $table->index('article_id'); });
        }

        public function down()
        {
            Schema::dropIfExists('ratings');
        }
};
