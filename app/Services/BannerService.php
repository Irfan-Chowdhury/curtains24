<?php

namespace App\Services;

use App\Http\traits\ENVFilePutContent;
use App\Http\traits\ImageHandleTrait;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerService
{
    use ENVFilePutContent, ImageHandleTrait;


    public function getBannerData() : object | null
    {
        $getBannerData = Banner::latest()->first();

        $bannerImageOne = optional($getBannerData?->bannerImageOne)->path;
        $bannerImageTwo = optional($getBannerData?->bannerImageTwo)->path;

        $arrayData = [
            'title' => isset($getBannerData->title) ? $getBannerData->title : '',
            'banner_image_1' => $this->imageOrDefault($bannerImageOne, 'Banner Image-1'),
            'banner_image_2' => $this->imageOrDefault($bannerImageTwo, 'Banner Image-2'),
        ];

        return json_decode(json_encode($arrayData), false);
    }

    private function imageOrDefault($path, $default)
    {
        return isset($path) && (Storage::disk('public')->exists($path)) ? url("storage/{$path}") : "https://dummyimage.com/50x50/000000/0f6954.png&text=$default";
    }



    public function updateData($request)
    {
        $banner = Banner::latest()->first();
        $banner->title = $request->title;

        $dbBannerImageOnePath = optional($banner?->bannerImageOne)->path;
        $dbBannerImageTwoPath = optional($banner?->bannerImageTwo)->path;


        if($request->banner_image_1) {
            $bannerImageOnePath = $this->getImagePath($request->banner_image_1, $dbBannerImageOnePath, 'banner_images');
            $this->imageUpdateOrCreate($banner, 'bannerImageOne', $bannerImageOnePath, 'banner_images');
        }

        if ($request->banner_image_2) {
            $bannerImageTwoPath = $this->getImagePath($request->banner_image_2, $dbBannerImageTwoPath, 'banner_images');
            $this->imageUpdateOrCreate($banner, 'bannerImageTwo', $bannerImageTwoPath, 'banner_images');
        }

        $banner->update();
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
