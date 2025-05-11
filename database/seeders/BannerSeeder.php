<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    // php artisan db:seed --class=BannerSeeder

    public function run(): void
    {
        // Banner::truncate();

        $banner = Banner::create([
            'title' => 'Banner Title'
        ]);

        $banner->images()->create([
            'path' => 'banner_image_1.jpg',
            'type' => 'banner_image_1'
        ]);

        $banner->images()->create([
            'path' => 'banner_image_2.jpg',
            'type' => 'banner_image_2'
        ]);

    }
}
