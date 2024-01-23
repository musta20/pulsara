<?php

declare(strict_types=1);

use App\Enums\Stage\Stage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', static function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->text('content');

            $table->string('stage')
            ->default(Stage::Submitted->value);

            $table->foreignUlid('group_id')
            ->index()
            ->constrained()
            ->cascadeOnDelete();
            $table->foreignUlid('profile_id')
            ->index()
            ->constrained()
            ->cascadeOnDelete();
            $table->timestamp('stage_updated_at');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
