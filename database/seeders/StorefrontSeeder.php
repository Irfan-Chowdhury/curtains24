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
            'slider_heading' => 'HOW IT LOOKS',
            'slider_description' => 'Discover how our curtains transform spaces: get inspired and imagine the perfect look for your own home.',
            'booking_heading' => 'BOOK FREE MEASUREMENTS',
            'booking_description' => 'Our team will come with fabric samples.',
            'contact_heading' => 'CONTACT US',
            'contact_description' => 'We will get back in 5 minutes',
        ]);
    }
}
