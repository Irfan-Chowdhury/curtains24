<?php

namespace Database\Seeders;

// use Database\Seeders\CountriesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
            CountriesTableSeeder::class,
            GeneralSettingSeeder::class,
            UserSeeder::class,
            BannerSeeder::class,
            ModuleSeeder::class,
            TermAndConditionSeeder::class,
        ]);

    }
}
