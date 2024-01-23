<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Stage\Stage;
use App\Models\Group;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
final class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stage'=>Stage::Submitted,
            'content'=>$this->faker->realText(
                maxNbChars:3_400,
                indexSize:4
            ),
            'group_id'=>Group::factory(),
            'profile_id'=>Profile::factory(),
            'state_updated_at'=>now(),
            'published_at'=>null
            
        ];
    }
}
