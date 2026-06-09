<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_posts', function (Blueprint $table) {

            $table->foreignId('campaign_id')
                ->nullable()
                ->after('organization_id')
                ->constrained()
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('social_posts', function (Blueprint $table) {

            $table->dropForeign(['campaign_id']);

            $table->dropColumn('campaign_id');

        });
    }
};
