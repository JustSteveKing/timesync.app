<?php

use App\Enums\EventStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('events', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('title');
            $table->string('status')->default(EventStatus::TENTATIVE->value);
            $table->string('summary');
            $table->string('meeting');

            $table->string('timezone');

            $table->text('agenda')->nullable();

            $table
                ->foreignUlid('user_id')
                ->comment('Organiser')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table
                ->foreignUlid('team_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table
                ->foreignUlid('type_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
