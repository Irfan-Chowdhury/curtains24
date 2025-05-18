<?php

namespace App\Services;

use App\Http\traits\ImageHandleTrait;
use App\Models\Storefront;
use Illuminate\Support\Facades\Storage;

class StorefrontService
{
    use ImageHandleTrait;

    public function getLatestData() : object | null
    {
        $bookingData = Storefront::latest()->first();

        $bannerImagePath = optional($bookingData?->image)->path;

        $arrayData = [
            'heading' => isset($bookingData->booking_heading) ? $bookingData->booking_heading : '',
            'description' => isset($bookingData->booking_description) ? $bookingData->booking_description : '',
            'banner_image' => $this->imageOrDefault($bannerImagePath, 'Banner Image'),
            'contact_heading' => isset($bookingData->contact_heading) ? $bookingData->contact_heading : '',
            'contact_description' => isset($bookingData->contact_description) ? $bookingData->contact_description : '',
        ];

        return json_decode(json_encode($arrayData), false);
    }

    private function imageOrDefault($path, $default)
    {
        return isset($path) && (Storage::disk('public')->exists($path)) ? url("storage/{$path}") : "https://dummyimage.com/50x50/000000/0f6954.png&text=$default";
    }

    public function updateData($request): void
    {
        $storefront = Storefront::latest()->first();

        if($request->booking_heading && $request->booking_description) {
            $storefront->booking_heading = $request->booking_heading;
            $storefront->booking_description = $request->booking_description;
        }

        if($request->contact_heading && $request->contact_description) {
            $storefront->contact_heading = $request->contact_heading;
            $storefront->contact_description = $request->contact_description;
        }

        if($request->banner_image) {
            $dbBannerImagePath = optional($storefront?->image)->path;
            $bannerImageOnePath = $this->getImagePath($request->banner_image, $dbBannerImagePath, 'booking_measurement');
            $this->imageUpdateOrCreate($storefront, 'image', $bannerImageOnePath, 'booking_measurement');
        }

        $storefront->update();
    }


    private function getImagePath($requestImage, $dbImagePath, $folder)
    {
        if (!isset($requestImage))
            return $dbImagePath;

        $this->previousImageDelete($dbImagePath); //if null, then this line skip
        return $this->imageStore($requestImage, "uploads/images/$folder/", null, null);
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
