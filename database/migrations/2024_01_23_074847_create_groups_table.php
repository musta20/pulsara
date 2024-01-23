<?php

declare(strict_type=1);

use App\Enums\Publishing\Status;
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
        Schema::create('groups', static function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('description', 160);
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();

            $table->string('status')->default(Status::Public->value);
            $table->json('tags')->nullable();

            $table->unsignedBigInteger('members')->default(0);

            $table->foreignUlid('user_id')
                ->comment('Admin User Id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
