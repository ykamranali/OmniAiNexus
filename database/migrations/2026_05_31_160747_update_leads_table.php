<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {

            $table->foreignId('organization_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->nullOnDelete();

            $table->string('name')->after('organization_id');

            $table->string('email')->nullable();

            $table->string('phone')->nullable();

            $table->string('source')->nullable();

            $table->string('status')->default('New');

            $table->decimal('value', 12, 2)->default(0);

            $table->text('notes')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {

            $table->dropConstrainedForeignId('organization_id');

            $table->dropColumn([
                'name',
                'email',
                'phone',
                'source',
                'status',
                'value',
                'notes',
            ]);
        });
    }
};
