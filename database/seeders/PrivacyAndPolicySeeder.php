<?php

namespace Database\Seeders;

use App\Models\PrivacyAndPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyAndPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrivacyAndPolicy::create([
            'title' => 'Privacy Policy',
            'description' => 'This is the privacy policy for the website.',
        ]);
    }
}
