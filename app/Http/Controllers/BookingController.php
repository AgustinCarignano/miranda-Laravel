<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    const DEFAULT_BOOKING = [
        'checkIn' => '',
        'checkOut' => '',
        'guest' => '',
        'email' => '',
        'phone' => '',
        'message' => '',
        'roomId' => '',
    ];
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookingData = $request;
        $bookingDB = $this->getBookingDB($request);
        $room = Room::find($bookingDB['roomId']);
        $room['photos'] = explode(',', $room['photos']);
        $room['amenities'] = explode(',', $room['amenities']);
        $presentationPrice = $room['offer'] === 1 ? "pageDetailsPresentation__prices offerPrice" : "pageDetailsPresentation__prices";
        $inpuptErrors = [
            'checkIn' => false,
            'checkOut' => false,
            'guest' => false,
            'email' => false,
            'phone' => false,
        ];
        $hasError = false;
        foreach ($inpuptErrors as $k => $v) {
            if (!$request[$k]) {
                $inpuptErrors[$k] = true;
                $hasError = true;
            }
        }
        $sentForm = false;
        if (!$hasError) {
            Booking::create($bookingDB);
            $sentForm = true;
            $postMessage = bookingMessage()['success'];
            $bookingData = $this::DEFAULT_BOOKING;
        }
        $relatedRoomsData = Room::all()->skip(3)->take(2);
        $relatedRooms = $this->formateRooms($relatedRoomsData);
        return view("roomDetails", [
            "room" => $room,
            'booking' => $bookingData,
            'inputErrors' => $inpuptErrors,
            'hasError' => $hasError,
            'sentForm' => $sentForm,
            'postMessage' => $postMessage,
            'amenities' => amenities(),
            'classOfferPrice' => $presentationPrice,
            'icons' => icons(),
            'relatedRooms' => $relatedRooms
        ]);
    }
    private function getBookingDB($data)
    {
        return [
            'guest' => $data['guest'],
            'specialRequest' => $data['message'],
            'orderDate' => date("Y-m-d H:i:s"),
            'status' => 'Check In',
            'checkIn' => $data['checkIn'],
            'checkOut' => $data['checkOut'],
            'roomId' => $data['roomId'],
        ];
    }
    private function isAvailableRoom($roomdId, $in, $out)
    {
    }
    private function formateRooms($rooms)
    {
        foreach ($rooms as $room) {
            $room['photos'] = explode(',', $room['photos']);
            $room['amenities'] = explode(',', $room['amenities']);
        }
        return $rooms;
    }
}
