<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Portfolio Personale',
                'description' => 'Il mio portfolio online con Laravel e Bootstrap',
                'cover_image' => 'portfolio.png'
            ],
            [
                'title' => 'Boolflix',
                'description' => 'Clone di Netflix con API TMDB',
                'cover_image' => 'boolflix.png'
            ],
            [
                'title' => 'Boolpress',
                'description' => 'Blog con CRUD completo in Laravel',
                'cover_image' => 'boolpress.png'
            ],
        ];

        foreach ($projects as $project) {
            Project::create([
                'title' => $project['title'],
                'description' => $project['description'],
                'slug' => Str::slug($project['title']),
                'cover_image' => $project['cover_image']
            ]);
        }
    }
}
