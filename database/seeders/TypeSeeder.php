<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Web App', 'Mobile App', 'Game', 'Library', 'Script'];

        foreach ($types as $type) {
            Type::create([
                'name' => $type,
                'slug' => Str::slug($type, '-')
            ]);
        }
    }
}
