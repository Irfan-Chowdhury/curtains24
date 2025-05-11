<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        Module::create([
            'title_1' => 'Title 1',
            'title_2' => 'Title 2',
            'title_3' => 'Title 3',
            'title_4' => 'Title 4',
            'title_5' => 'Title 5',
            'title_6' => 'Title 6',
        ]);
    }
}
