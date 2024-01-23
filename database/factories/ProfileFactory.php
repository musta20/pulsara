<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
final class ProfileFactory extends Factory
{
    protected $model = Profile::class; 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'handle'=>$this->faker->userName(),
            'cover'=>$this->faker->imageUrl(1290,680),
            'user_id'=>User::factory(),
            'country'=>$this->faker->countryCode()
        ];
    }
}
