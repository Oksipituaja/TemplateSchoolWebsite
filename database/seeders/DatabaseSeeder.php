<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Create test user if doesn't exist
        if (User::where('email', 'test@example.com')->doesntExist()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Call all content seeders
        $this->call([
            NewsSeeder::class,
            TeacherSeeder::class,
            GallerySeeder::class,
            AgendaSeeder::class,
            FacilitySeeder::class,
            AboutSeeder::class,
        ]);
    }
}
