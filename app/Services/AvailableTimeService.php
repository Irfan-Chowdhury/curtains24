<?php

namespace App\Services;

use App\Models\AvailableTime;
use Carbon\Carbon;
use Exception;

class AvailableTimeService
{
    public function getAllData(): object|null
    {
        $availableTimeQuery = AvailableTime::select('id','start_time','end_time')
                            ->orderBy('start_time')
                            ->get();

        return  (object) $availableTimeQuery->map(function ($availableTime) {
            return (object) [
                'id' => $availableTime->id,
                'start_time' => Carbon::createFromFormat('H:i:s', $availableTime->start_time)->format('h:i A'),
                'end_time' => Carbon::createFromFormat('H:i:s', $availableTime->end_time)->format('h:i A'),
            ];
        });
    }

    public function storeData(object $request): void
    {
        $this->isTimeOverlap($request);

        AvailableTime::create([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
    }

    private function isTimeOverlap($request)
    {
        $newStart = Carbon::createFromFormat('H:i', $request->start_time)->format('H:i:s');
        $newEnd = Carbon::createFromFormat('H:i', $request->end_time)->format('H:i:s');

        $overlap = AvailableTime::where(function ($query) use ($newStart, $newEnd) {
            $query->where('start_time', '<', $newEnd)
                ->where('end_time', '>', $newStart);
        })->exists();

        if ($overlap) {
            throw new Exception("This time slot overlaps with an existing one.", 1);
        }
    }

    public function findData(object|null $availableTime): object
    {
        return (object) [
            'id' => $availableTime->id,
            'start_time' => Carbon::createFromFormat('H:i:s', $availableTime->start_time)->format('H:i'),
            'end_time' => Carbon::createFromFormat('H:i:s', $availableTime->end_time)->format('H:i'),
        ];
    }

    public function updateData(array $validated): void
    {
        $data = collect($validated)->except('available_time_id')->toArray();
        AvailableTime::where('id', $validated['available_time_id'])->update($data);
    }
}
