<?php

namespace Database\Seeders;

use App\Http\traits\ENVFilePutContent;
use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    use ENVFilePutContent;

    public function run(): void
    {
        GeneralSetting::truncate();

        $siteTitle = "FNOMAD Curtains";
        $timeZone = "Asia/Dhaka";

        GeneralSetting::create([
            'site_title' => $siteTitle,
            'phone' => '+971 52 477 2085',
            'site_logo'  => "logo.png",
            'time_zone' => $timeZone,
            'currency' => "$",
            'currency_format' => "prefix",
            'payment_logo'  => "logo.png",
        ]);

        //writting timezone info in .env file
        $this->dataWriteInENVFile('APP_NAME',$siteTitle);
        $this->dataWriteInENVFile('APP_TIMEZONE',$timeZone);
    }
}
