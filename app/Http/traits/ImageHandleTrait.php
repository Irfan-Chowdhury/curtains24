<?php

declare(strict_types=1);

namespace App\Http\traits;

use Exception;
use Illuminate\Support\Facades\Session;
use Image;
use Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageHandleTrait {

    // public function imageStore(string|object $imageFile, string $directory, int $width, int $height)
    // {

    //     $fileName  = Str::random(10). '.' .$imageFile->getClientOriginalExtension();

    //     $image = Image::make($imageFile)->resize($width, $height)->encode('jpg');

    //     $filePath = $directory."{$fileName}";

    //     Storage::disk('public')->put($filePath, $image);

    //     return $filePath;
    // }

    public function imageStore(string|object $imageFile, string $directory, int|null $width, int|null $height): string
    {
        $extension = strtolower($imageFile->getClientOriginalExtension());

        // Block unsupported types
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
        if (!in_array($extension, $allowed)) {
            throw new Exception("Unsupported image type: {$extension}");
        }

        $fileName  = Str::random(10) . '.' . $extension;

        // $image = Image::make($imageFile)->resize($width, $height)->encode($extension); // you may also encode to $extension
        $image = Image::make($imageFile);

        if ($width && $height) {
            $image->resize($width, $height);
        }

        $image->encode($extension);

        $filePath = $directory . $fileName;

        Storage::disk('public')->put($filePath, $image);

        return $filePath;
    }


    public function previousImageDelete(string|null $filePath): void
    {
        if (isset($filePath) && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }


    public function imageSliderStore($image, $directory,$width, $height)
    {
        $imageName       = Str::random(10). '.' .$image->getClientOriginalExtension();
        $location  = public_path($directory.$imageName);
        Image::make($image)->resize($width,$height)->save($location);
        $imageUrl = $directory.$imageName;

        return $imageUrl;
    }
}
