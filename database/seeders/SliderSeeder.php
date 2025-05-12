<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::truncate();

        Slider::create([
            'title' => 'Title 1',
            'is_title_visible' => false,
            'is_active' => true,
        ]);

    }
}
