<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_accounts', function (Blueprint $table) {

            $table->text('token_expires_at')
                ->nullable()
                ->after('refresh_token');

            $table->json('metadata')
                ->nullable()
                ->after('token_expires_at');

            $table->timestamp('last_sync_at')
                ->nullable()
                ->after('metadata');

            $table->unsignedBigInteger('followers_count')
                ->default(0)
                ->after('last_sync_at');

            $table->unsignedBigInteger('following_count')
                ->default(0)
                ->after('followers_count');

            $table->unsignedBigInteger('posts_count')
                ->default(0)
                ->after('following_count');
        });
    }

    public function down(): void
    {
        Schema::table('social_accounts', function (Blueprint $table) {

            $table->dropColumn([
                'token_expires_at',
                'metadata',
                'last_sync_at',
                'followers_count',
                'following_count',
                'posts_count',
            ]);
        });
    }
};
