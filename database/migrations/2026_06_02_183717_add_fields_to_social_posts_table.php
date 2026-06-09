<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_posts', function (Blueprint $table) {

            $table->foreignId('organization_id')
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('social_account_id')
                ->nullable()
                ->after('organization_id')
                ->constrained()
                ->nullOnDelete();

            $table->string('platform')
                ->after('social_account_id');

            $table->longText('content')
                ->after('platform');

            $table->enum('status', [
                'Draft',
                'Scheduled',
                'Published',
                'Failed',
            ])->default('Draft')
              ->after('content');

            $table->timestamp('scheduled_at')
                ->nullable()
                ->after('status');

            $table->timestamp('published_at')
                ->nullable()
                ->after('scheduled_at');
        });
    }

    public function down(): void
    {
        Schema::table('social_posts', function (Blueprint $table) {

            $table->dropForeign(['organization_id']);
            $table->dropForeign(['social_account_id']);

            $table->dropColumn([
                'organization_id',
                'social_account_id',
                'platform',
                'content',
                'status',
                'scheduled_at',
                'published_at',
            ]);
        });
    }
};
