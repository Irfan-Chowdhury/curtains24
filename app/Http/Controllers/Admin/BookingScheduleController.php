<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingScheduleController extends Controller
{
    public function index()
    {
        $bookingScheduleQuery = BookingSchedule::select('id','building_name','phone','date','start_time','end_time')
                                ->orderBy('date')
                                ->get();

        $bookingSchedules =  (object) $bookingScheduleQuery->map(function ($bookingSchedule) {
            return (object) [
                'id' => $bookingSchedule->id,
                'building_name' => $bookingSchedule->building_name,
                'phone' => $bookingSchedule->phone,
                'date' => Carbon::createFromFormat('Y-m-d', $bookingSchedule->date)->format('d-m-Y'),
                'start_time' => Carbon::createFromFormat('H:i:s', $bookingSchedule->start_time)->format('h:i A'),
                'end_time' => Carbon::createFromFormat('H:i:s', $bookingSchedule->end_time)->format('h:i A'),
            ];
        });

        return view('admin.pages.booking-schedule.index', compact('bookingSchedules'));
    }

    public function destroy(BookingSchedule $bookingSchedule)
    {
        $bookingSchedule->delete();

        $this->setSuccessMessage('Booking schedule deleted successfully');

        return redirect()->back();
    }
}
