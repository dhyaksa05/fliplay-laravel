<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Abi',
            'email' => 'abi@example.com',
        ]);
        User::factory(2)->create();

        Media::factory(10)->create();
    }
}
