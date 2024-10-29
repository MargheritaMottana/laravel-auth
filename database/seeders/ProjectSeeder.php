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

            $project = new Project();

            $project->title = fake()->words(2, true);
            $project->description = fake()->paragraph();
            // cover
            $project->client = fake()->words(2, true);
            $project->sector = fake()->word();
            $project->status = fake()->word();

            $project->save();
        }
    }
}
