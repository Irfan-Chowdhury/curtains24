<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\traits\ImageHandleTrait;
use App\Models\Slider;
use App\Models\Storefront;
use Illuminate\Support\Facades\Storage;
class SliderService
{
    use ImageHandleTrait;

    public function getSliderData(): object|null
    {
        $storeFront = Storefront::latest()->first();
        $slidersQuery = Slider::select('id', 'title', 'is_title_visible', 'is_active')
                    ->with('image:imageable_id,path,type');
                    // ->get();

        if (request()->routeIs('home')) {
            $slidersQuery = $slidersQuery->where('is_active', true);
        }

        $sliders = $slidersQuery->get();

        $arrayData = [
            'slider_heading' => $storeFront->slider_heading,
            'slider_description' => $storeFront->slider_description,
            'images' => $sliders->map(function ($slider) {
                return (object) [
                    'id' => $slider->id,
                    'title' => $slider->title,
                    'isTitleVisible' => $slider->is_title_visible,
                    'isActive' => $slider->is_active,
                    'url' => isset($slider->image->path) && Storage::disk('public')->exists($slider->image->path) ? Storage::url($slider->image->path) : "https://dummyimage.com/50x50/000000/0f6954.png&text=Slider",
                    'type' => $slider->image->type,
                ];
            }),
        ];

        return json_decode(json_encode($arrayData), false);
    }

    public function storeData($request): void
    {
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->is_title_visible = (boolean) $request->is_title_visible;
        $slider->is_active = (boolean) $request->is_active;
        $slider->save();

        $slider->image()->create([
            'path' => $this->imageStore($request->slider_image, "uploads/images/slider/", null, null),
            'type' => 'slider',
        ]);
    }

    public function findData(object|null $slider): object
    {
        $slider->load('image:imageable_id,path,type');

        return (object) [
            'id' => $slider->id,
            'title' => $slider->title,
            'isTitleVisible' => (boolean) $slider->is_title_visible,
            'isActive' => (boolean) $slider->is_active,
            'path' => isset($slider->image->path) && Storage::disk('public')->exists($slider->image->path) ? Storage::url($slider->image->path) : "https://dummyimage.com/50x50/000000/0f6954.png&text=Slider",
            'type' => $slider->image->type,
        ];
    }

    public function sliderContentUpdate($request): void
    {
        if($request->type !== 'content'){
            return;
        }

        $storeFront = Storefront::latest()->first();
        $storeFront->slider_heading = $request->slider_heading;
        $storeFront->slider_description = $request->slider_description;
        $storeFront->update();
    }

    public function sliderImageUpdate($request): void
    {
        if($request->type !== 'slider'){
            return;
        }

        $slider = Slider::find($request->slider_id);
        $slider->title = $request->title;
        $slider->is_title_visible = (boolean) $request->is_title_visible;
        $slider->is_active = (boolean) $request->is_active;
        $slider->update();

        $dbSliderImagePath = optional($slider?->image)->path;


        if($request->slider_image){
            $sliderImagePath = $this->getImagePath($request->slider_image, $dbSliderImagePath, 'slider');

            // $sliderImagePath = $this->imageStore($request->image, "uploads/images/slider/", 300, 300);
            $this->imageUpdateOrCreate($slider, 'image', $sliderImagePath, 'slider');
        }

    }

    private function getImagePath(object $requestImage, string $dbImagePath, string $folder): string
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

    public function destroy($slider): void
    {
        $this->previousImageDelete($slider->image->path);
        $slider->image()->delete();
        $slider->delete();
    }
}
