<?php

namespace Database\Seeders;

use App\Baltpoint\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $user = User::query()->create([
                'email' => fake()->unique()->safeEmail(),
            ]);

            $user->phone()->create([
                'value' => 8 . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9),
            ]);
        }
    }
}
