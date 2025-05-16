<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AvailableTime;
use App\Services\AvailableTimeService;
use Exception;
use Illuminate\Http\Request;

class AvailableTimeController extends Controller
{
    protected $availableTimeService;

    public function __construct(AvailableTimeService $availableTimeService)
    {
        $this->availableTimeService = $availableTimeService;
    }

    public function index()
    {
        $timeSlots = $this->availableTimeService->getAllData();

        return view('admin.pages.available-time.index', compact('timeSlots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        try {
            $this->availableTimeService->storeData($request);

            $this->setSuccessMessage('Time created successfully');

        } catch (Exception $exception) {

            return back()->withErrors(['error' => $exception->getMessage()]);
        }

        return redirect()->back();
    }

    public function edit(AvailableTime $availableTime)
    {
        $timeSlots = $this->availableTimeService->findData($availableTime);

        return response()->json($timeSlots);
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'available_time_id' => 'nullable|integer',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        try {

            $this->availableTimeService->updateData($validated);

            $this->setSuccessMessage('Time updated successfully');

        } catch (Exception $exception) {

            return back()->withErrors(['error' => $exception->getMessage()]);
        }

        return redirect()->back();
    }

    public function destroy(AvailableTime $availableTime)
    {
        try {
            $availableTime->delete();

            $this->setSuccessMessage('Time deleted successfully');

        } catch (Exception $exception) {

            return back()->withErrors(['error' => $exception->getMessage()]);
        }

        return redirect()->back();
    }
}
