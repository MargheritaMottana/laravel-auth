<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// model
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for($i=0; $i<10; $i++) {

            // creo una variabile per titolo e per slug
            $title = fake()->words(5, true);
            // aggiunta slug
            $slug = str_replace([' '], ['-'], strtolower($title));

            Project::create([

                'title' => $title,
                'slug' => $slug,
                'description' => fake()->paragraph(),
                'cover' => fake()->optional()->imageUrl(),
                'client' => fake()->words(2, true),
                'sector' => fake()->word(),
                'published' => fake()->boolean(70),

            ]);
        }
    }
}
