<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_metrics', function (Blueprint $table) {

            $table->id();

            $table->foreignId('organization_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('platform');

            $table->date('date');

            $table->integer('followers')->default(0);
            $table->integer('impressions')->default(0);
            $table->integer('reach')->default(0);

            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('shares')->default(0);

            $table->integer('clicks')->default(0);
            $table->integer('profile_visits')->default(0);
            $table->integer('posts_count')->default(0);

            $table->decimal('engagement_rate', 8, 2)
                ->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_metrics');
    }
};
