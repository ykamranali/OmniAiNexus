<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plans', function (Blueprint $table) {

            $table->integer('max_leads')
                ->default(100);

            $table->integer('max_deals')
                ->default(100);

            $table->integer('max_tasks')
                ->default(100);

            $table->integer('max_social_accounts')
                ->default(3);

            $table->integer('max_ai_tokens')
                ->default(1000);

        });
    }

    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {

            $table->dropColumn([
                'max_leads',
                'max_deals',
                'max_tasks',
                'max_social_accounts',
                'max_ai_tokens',
            ]);

        });
    }
};
