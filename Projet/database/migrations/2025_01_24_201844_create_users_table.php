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
    Schema::create('users', function (Blueprint $table) {
        $table->id(); // Auto-incrementing primary key
        $table->string('name'); // User's name
        $table->string('email')->unique(); // Unique email address
        $table->string('password'); // Hashed password
        $table->enum('role', [ 'guest','subscriber', 'manager', 'editor'])->default('subscriber'); // User role
        $table->integer('manager_of_theme')->nullable()->default(null); // Whether the theme is featured
        $table->string('image')->nullable()->default('uploads/profile_pictures/default-image.jpg');
        $table->timestamps(); // Created_at and updated_at timestamps

        // Add index for role
        $table->index('role');
    });
}

public function down()
{
    Schema::dropIfExists('users');
}
};
