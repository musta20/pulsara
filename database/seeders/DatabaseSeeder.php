<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Enums\Publishing\Status;
use App\Enums\Stage\Stage;
use App\Models\Group;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user =  User::factory()->create([
            'first_name' => 'mustafa',
            'last_name' => 'osman',
            'email' => 'saif.muh2020@gmail.com',
            'password' => Hash::make('2486'),
            'role' => Role::Admin,
            'provider' => Provider::Email,
            'avatar' => 'https://github.com/musta20.png'
        ]);

        $profile =  Profile::factory()->for($user)
            ->create([
                'handle' => 'musta20',
                'country' => 'eg',
            ]);

        $group =  Group::factory()->for($user)->create([
            'name' => 'feed',
            'description' => 'The deafult news feed group,',
            'status' => Status::Verified,
        ]);
        Post::factory()->for($group)->for($profile)->count(10)->create([
            'stage'=>Stage::Approved
        ]);







        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
