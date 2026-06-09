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
    Schema::create('plans', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->decimal('monthly_price', 10, 2)->default(0);

        $table->integer('trial_days')->default(15);

        $table->integer('max_users')->default(5);

        $table->integer('max_ai_requests')->default(5000);

        $table->integer('max_campaigns')->default(25);

        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
