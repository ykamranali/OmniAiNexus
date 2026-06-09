<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('organization_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('lead_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('deal_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title');

            $table->text('description')->nullable();

            $table->dateTime('due_date')->nullable();

            $table->enum('status', [
                'Pending',
                'In Progress',
                'Completed',
                'Cancelled',
            ])->default('Pending');

            $table->enum('priority', [
                'Low',
                'Medium',
                'High',
            ])->default('Medium');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
