<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = ['PHP', 'JavaScript', 'Laravel', 'Vue.js', 'React', 'MySQL', 'Node.js'];

        foreach ($technologies as $tech) {
            Technology::create([
                'name' => $tech,
            ]);
        }
    }
}
