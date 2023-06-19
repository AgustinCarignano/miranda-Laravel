<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'checkIn' => 'required',
            'checkOut' => 'required',
            'guest' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $isAvailable = Room::checkAvailability($request['roomId'], $request['checkIn'], $request['checkOut']);
        if ($isAvailable) {
            Booking::createBooking($request);
            return back()->with('done', 'success');
        } else {
            return back()->with('done', 'notAvailable');
        }
    }
}
