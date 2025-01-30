<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title'); // Issue title (e.g., "Issue 1 - January 2023")
            $table->text('description')->nullable(); // Issue description
            $table->date('publication_date'); // Publication date
            $table->boolean('is_public')->default(false); // Whether the issue is public
            $table->string('image')->nullable(); // Adding image column
            $table->timestamps(); // Created_at and updated_at timestamps
          // Add indexes
    $table->index('publication_date');
    $table->index('is_public');
});
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
};
