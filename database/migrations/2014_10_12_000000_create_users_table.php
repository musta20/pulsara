<?php

declare(strict_types=1);

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
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
        Schema::create('users', static function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('Role')->default(Role::User->value);

            $table->string('avatar')->nullable();
            $table->string('password')->nullable();
            $table->string('provider')->default(Provider::Email->value);
            $table->string('provider_id')->nullable();

            $table->text('access_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();

            $table->softDeletes();

            $table->unique(['email','provider']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
