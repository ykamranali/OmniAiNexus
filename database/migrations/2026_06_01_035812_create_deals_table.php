<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {

            $table->id();

            $table->foreignId('organization_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('lead_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title');

            $table->decimal('amount', 12, 2)
                ->default(0);

            $table->enum('stage', [
                'New',
                'Qualified',
                'Proposal',
                'Negotiation',
                'Won',
                'Lost',
            ])->default('New');

            $table->date('expected_close_date')
                ->nullable();

            $table->text('notes')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
