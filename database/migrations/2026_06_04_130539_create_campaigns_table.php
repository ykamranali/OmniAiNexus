<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {

            $table->id();

            $table->foreignId('organization_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->text('description')
                ->nullable();

            $table->enum('type', [
                'Social Media',
                'Email Marketing',
                'Lead Generation',
                'Brand Awareness',
                'Product Launch',
            ])->default('Social Media');

            $table->enum('status', [
                'Draft',
                'Scheduled',
                'Running',
                'Completed',
                'Paused',
                'Cancelled',
            ])->default('Draft');

            $table->decimal(
                'budget',
                12,
                2
            )->default(0);

            $table->date('start_date')
                ->nullable();

            $table->date('end_date')
                ->nullable();

            $table->json('platforms')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
