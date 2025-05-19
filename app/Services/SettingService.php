<?php

namespace App\Services;

use App\Http\traits\ENVFilePutContent;
use App\Http\traits\ImageHandleTrait;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Storage;

class SettingService
{
    use ENVFilePutContent, ImageHandleTrait;


    public function getGeneralSettingData() : object | null
    {
        $getGeneralSettingsData = GeneralSetting::latest()->first();

        $siteLogo = optional($getGeneralSettingsData->siteLogo)->path;
        $paymentLogo = optional($getGeneralSettingsData->paymentLogo)->path;

        $arrayData = [
            'site_title' => isset($getGeneralSettingsData->site_title) ? $getGeneralSettingsData->site_title : '',
            'phone' => isset($getGeneralSettingsData->phone) ? $getGeneralSettingsData->phone : '',
            'whatsapp_number' => isset($getGeneralSettingsData->whatsapp_number) ? $getGeneralSettingsData->whatsapp_number : '',
            'whatsapp_default_message' => isset($getGeneralSettingsData->whatsapp_default_message) ? $getGeneralSettingsData->whatsapp_default_message : '',
            'site_logo' => $this->imageOrDefault($siteLogo, 'Company Logo'),
            'payment_logo' => $this->imageOrDefault($paymentLogo, 'Payment Logo'),
            'time_zone' => isset($getGeneralSettingsData->time_zone) ? $getGeneralSettingsData->time_zone : 'Asia/Dhaka',
            'currency' => isset($getGeneralSettingsData->currency) ? $getGeneralSettingsData->currency : '',
            'currency_format' => isset($getGeneralSettingsData->currency_format) ? $getGeneralSettingsData->currency_format : '',
        ];

        return json_decode(json_encode($arrayData), false);
    }

    private function imageOrDefault($path, $default)
    {
        return isset($path) && (Storage::disk('public')->exists($path)) ? url("storage/{$path}") : "https://dummyimage.com/50x50/000000/0f6954.png&text=$default";
    }

    public function getAllTimeZones()
    {
        $zones_array = array();
        $timestamp = time();

        foreach (timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }

        return $zones_array;
    }






    public function saveData($request)
    {
        $generalSetting = GeneralSetting::latest()->first();
        $generalSetting->site_title = $request->site_title;
        $generalSetting->phone = $request->phone;
        $generalSetting->time_zone = $request->time_zone;
        $generalSetting->currency = $request->currency;
        $generalSetting->currency_format = $request->currency_format;
        $generalSetting->whatsapp_number = $request->whatsapp_number;
        $generalSetting->whatsapp_default_message = $request->whatsapp_default_message;

        $dbSiteLogoPath = optional($generalSetting->siteLogo)->path;
        $dbPaymentLogoPath = optional($generalSetting->paymentLogo)->path;


        if($request->site_logo) {
            $siteLogoPath = $this->getImagePath($request->site_logo, $dbSiteLogoPath, 'company_logo');
            $this->imageUpdateOrCreate($generalSetting, 'siteLogo', $siteLogoPath, 'site_logo');
        }

        if ($request->payment_logo) {
            $paymentLogoPath = $this->getImagePath($request->payment_logo, $dbPaymentLogoPath, 'payment_logo');
            $this->imageUpdateOrCreate($generalSetting, 'paymentLogo', $paymentLogoPath, 'payment_logo');
        }

        $generalSetting->update();


        // $this->dataWriteInENVFile('APP_TIMEZONE',$request->time_zone);
        // $path = base_path('config/variable.php');
        // $searchArray = array(
        //     config('variable.currency'),
        //     config('variable.currency_format'), config('variable.account_id'));
        // $replaceArray = array($request->currency, $request->currency_format, 1);
        // file_put_contents($path, str_replace($searchArray, $replaceArray, file_get_contents($path)));

    }


    private function getImagePath($requestImage, $dbImagePath, $folder)
    {
        if (!isset($requestImage))
            return $dbImagePath;

        $this->previousImageDelete($dbImagePath); //if null, then this line skip
        return $this->imageStore($requestImage, "uploads/images/$folder/", 300, 300);
    }



    public function imageUpdateOrCreate($parentModel, $relationMethod, $imagePath, $type): void
    {
        $image = $parentModel->{$relationMethod};

        if($image) {
            $image->update(['path' => $imagePath]);
        }else {
            $parentModel->{$relationMethod}()->create([
                'path' => $imagePath,
                'type' => $type,
            ]);
        }
    }
}
