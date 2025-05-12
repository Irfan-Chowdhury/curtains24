<?php

namespace Database\Seeders;

use App\Models\Storefront;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorefrontSeeder extends Seeder
{
    // php artisan db:seed --class=StorefrontSeeder
    public function run(): void
    {
        Storefront::truncate();

        Storefront::create([
            'slider_heading' => 'Slider Heading',
            'slider_description' => 'Slider Description',
        ]);
    }
}
