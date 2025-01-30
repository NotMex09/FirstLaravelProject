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
    Schema::create('subscriptions', function (Blueprint $table) {
        $table->id(); // Auto-incrementing primary key
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
        $table->foreignId('theme_id')->constrained()->onDelete('cascade'); // Foreign key to themes table
        $table->timestamps(); // Created_at and updated_at timestamps
     // Add indexes
        $table->index('user_id');
        $table->index('theme_id');
        });
    }

public function down()
{
    Schema::dropIfExists('subscriptions');
}
};
