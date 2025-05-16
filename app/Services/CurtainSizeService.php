<?php

namespace App\Services;

use App\Models\CurtainSize;

class CurtainSizeService
{
    public function getAllData(): object|null
    {
        $curtainSizeQuery = CurtainSize::select('id','width_m','width_cm','height_m','height_cm','is_active');

        if (request()->routeIs('home')) {
            $curtainSizeQuery = $curtainSizeQuery->where('is_active', true);
        }

        $curtainSizes = $curtainSizeQuery->get();

        return  (object) $curtainSizes->map(function ($curtainSize) {
            return (object) [
                'id' => $curtainSize->id,
                'width' => number_format($curtainSize->width_m + ($curtainSize->width_cm / 100), 2),
                'height' => number_format($curtainSize->height_m + ($curtainSize->height_cm / 100), 2),
                'is_active' => $curtainSize->is_active,
                'width_details' => $curtainSize->width_m.'m '.$curtainSize->width_cm.'cm',
                'height_details' => $curtainSize->height_m.'m '.$curtainSize->height_cm.'cm',
            ];
        });
    }

    public function storeData(array $validated): void
    {
        CurtainSize::create($validated);
    }

    public function findData(object|null $curtainSize): object
    {
        return (object) [
            'id' => $curtainSize->id,
            'is_active' => (boolean) $curtainSize->is_active,
            'width_m' => $curtainSize->width_m,
            'width_cm' => $curtainSize->width_cm,
            'height_m' => $curtainSize->height_m,
            'height_cm' => $curtainSize->height_cm,
        ];
    }

    public function updateData(array $validated): void
    {
        $data = collect($validated)->except('curtain_size_id')->toArray();
        CurtainSize::where('id', $validated['curtain_size_id'])->update($data);
    }

    public function destroy(object|null $curtainSize): void
    {
        $curtainSize->delete();
    }
}
