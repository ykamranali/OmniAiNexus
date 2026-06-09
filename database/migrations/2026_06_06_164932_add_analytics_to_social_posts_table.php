<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_posts', function (Blueprint $table) {

            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('shares_count')->default(0);
            $table->integer('impressions_count')->default(0);
            $table->decimal('engagement_rate', 8, 2)->default(0);

        });
    }

    public function down(): void
    {
        Schema::table('social_posts', function (Blueprint $table) {

            $table->dropColumn([
                'likes_count',
                'comments_count',
                'shares_count',
                'impressions_count',
                'engagement_rate',
            ]);

        });
    }
};
