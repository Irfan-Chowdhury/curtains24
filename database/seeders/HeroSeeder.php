<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'heading' => 'Heading',
            'title_1' => 'Title 1',
            'description_1' => 'Description 1',
            'title_2' => 'Title 2',
            'description_2' => 'Description 2',
            'title_3' => 'Title 3',
            'description_3' => 'Description 3',
        ]);
    }
}
