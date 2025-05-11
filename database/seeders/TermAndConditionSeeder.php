<?php

namespace Database\Seeders;

use App\Models\TermAndCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermAndConditionSeeder extends Seeder
{

    // php artisan db:seed --class=TermAndConditionSeeder

    public function run(): void
    {
        TermAndCondition::truncate();

        TermAndCondition::create([
            'title' => 'Terms and Conditions Title' ,
            'description' => 'Terms and Conditions Description',
        ]);
    }
}
