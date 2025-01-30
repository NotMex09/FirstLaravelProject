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
        Schema::create('themes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Theme name (e.g., "Artificial Intelligence")
            $table->text('description')->nullable(); // Theme description
            $table->boolean('is_featured')->default(false); // Whether the theme is featured
            $table->string('image')->nullable(); // Adding image column
            $table->timestamps(); // Created_at and updated_at timestamps

            // Add indexes
            $table->index('name');
            $table->index('is_featured'); });
    }
    /**
         * Reverse the migrations.
         */
    public function down()
    {
        Schema::dropIfExists('themes');
    }



};
