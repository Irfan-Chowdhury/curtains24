<?php

namespace App\Services;

use App\Models\CurtainType;

class CurtainTypeService
{
    public function getAllData(): object|null
    {
        $curtainTypeQuery = CurtainType::select('id','name','price','is_active');

        if (request()->routeIs('home')) {
            $curtainTypeQuery = $curtainTypeQuery->where('is_active', true);
        }

        $curtainTypes = $curtainTypeQuery->get();

        return  (object) $curtainTypes->map(function ($curtainType) {
            return (object) [
                'id' => $curtainType->id,
                'name' => $curtainType->name,
                'price' => number_format($curtainType->price,2),
                'is_active' => $curtainType->is_active,
            ];
        });
    }

    public function storeData(array $validated): void
    {
        CurtainType::create($validated);
    }

    public function findData(object|null $curtainType): object
    {
        return (object) [
            'id' => $curtainType->id,
            'is_active' => (boolean) $curtainType->is_active,
            'name' => $curtainType->name,
            'price' => $curtainType->price,
        ];
    }

    public function updateData(array $validated): void
    {
        CurtainType::where('id', $validated['curtain_type_id'])->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'is_active' => $validated['is_active'] ?? false,
        ]);
    }
}
