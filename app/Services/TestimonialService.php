<?php

namespace App\Services;

use App\Http\traits\ImageHandleTrait;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
class TestimonialService
{
    use ImageHandleTrait;

    public function getTestimonialData(): object|null
    {

        $testimonialsQuery = Testimonial::select('id', 'is_active')
                            ->with('image:imageable_id,path,type');

        if (request()->routeIs('home')) {
            $testimonialsQuery = $testimonialsQuery->where('is_active', true);
        }

        $testimonials = $testimonialsQuery->get();

        return  (object) $testimonials->map(function ($testimonial) {
            return (object) [
                'id' => $testimonial->id,
                'isActive' => $testimonial->is_active,
                'url' => isset($testimonial->image->path) && Storage::disk('public')->exists($testimonial->image->path) ? Storage::url($testimonial->image->path) : "https://dummyimage.com/50x50/000000/0f6954.png&text=Slider",
                'type' => $testimonial->image->type,
            ];
        });
    }

    public function storeData($request): void
    {
        $testimonial = new Testimonial();
        $testimonial->is_active = (boolean) $request->is_active;
        $testimonial->save();

        $testimonial->image()->create([
            'path' => $this->imageStore($request->testimonial_image, "uploads/images/testimonial/", null, null),
            'type' => 'testimonial',
        ]);
    }

    public function findData(object|null $testimonial): object
    {
        $testimonial->load('image:imageable_id,path,type');

        return (object) [
            'id' => $testimonial->id,
            'isActive' => (boolean) $testimonial->is_active,
            'url' => isset($testimonial->image->path) && Storage::disk('public')->exists($testimonial->image->path) ? Storage::url($testimonial->image->path) : "https://dummyimage.com/50x50/000000/0f6954.png&text=Testimonial",
            'type' => $testimonial->image->type,
        ];
    }

    public function testimonialImageUpdate($request): void
    {
        $testimonial = Testimonial::find($request->testimonial_id);

        $testimonial->is_active = (boolean) $request->is_active;
        $testimonial->update();

        $dbTestimonialImagePath = optional($testimonial?->image)->path;


        if($request->testimonial_image){
            $testimonialImagePath = $this->getImagePath($request->testimonial_image, $dbTestimonialImagePath, 'testimonial');
            $this->imageUpdateOrCreate($testimonial, 'image', $testimonialImagePath, 'testimonial');
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

    public function destroy($testimonial): void
    {
        $this->previousImageDelete($testimonial->image->path);
        $testimonial->image()->delete();
        $testimonial->delete();
    }

}