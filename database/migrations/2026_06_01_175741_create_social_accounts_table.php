<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_accounts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('organization_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('platform');

            $table->string('account_name');

            $table->string('account_id')
                ->nullable();

            $table->longText('access_token')
                ->nullable();

            $table->longText('refresh_token')
                ->nullable();

            $table->enum('status', [
                'Connected',
                'Disconnected',
                'Expired',
            ])->default('Disconnected');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_accounts');
    }
};
