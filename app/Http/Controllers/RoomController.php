<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $roomsData = Room::all()->take(8);
        $rooms = $this->formateRooms($roomsData);
        return view('index', ['rooms' => $rooms, 'icons' => icons(), 'facilities' => facilities(), 'menues' => menues()]);
    }

    public function showAll()
    {
        $order = request('priceOrder');
        if ($order) {
            $rooms = Room::orderBy('price', $order)->paginate(6);
        } else {
            $rooms = Room::paginate(6);
        }
        if ($order) $rooms->appends(['priceOrder' => $order])->links();
        foreach ($rooms as $room) {
            $room->photos = explode(',', $room->photos);
            $room->amenities = explode(',', $room->amenities);
        }
        return view('roomsGrid', ['rooms' => $rooms, 'order' => $order, 'icons' => icons()]);
    }

    public function offerRooms()
    {
        $roomsData = Room::where('offer', "1")->get();
        $popularRoomsData = Room::all()->take(3);
        $rooms = $this->formateRooms($roomsData);
        $popularRooms = $this->formateRooms($popularRoomsData);
        return view('offers', ['rooms' => $rooms, 'amenities' => amenities(), 'popularRooms' => $popularRooms]);
    }

    public function availableRooms()
    {
        $in = $_GET['arrivalDate'];
        $out = $_GET['departureDate'];
        $order = request('priceOrder');
        $ocupiedRoomsData = Booking::select('roomId')->where("checkIn", ">=", $in)->where("checkIn", "<=", $out)
            ->orWhere("checkOut", ">=", $in)->where("checkOut", "<=", $out)
            ->orWhere("checkIn", ">=", $in)->where("checkOut", "<=", $out)
            ->orWhere("checkIn", "<=", $in)->where("checkOut", ">=", $out)->get();
        $ocupiedRoomsId = [];
        foreach ($ocupiedRoomsData as $room) {
            $ocupiedRoomsId[] = $room['roomId'];
        }
        if ($order) {
            $roomsData = Room::whereNotIn('_id', $ocupiedRoomsId)->orderBy('price', $order)->paginate(6);
            $roomsData->appends(['priceOrder' => $order])->links();
        } else {
            $roomsData = Room::whereNotIn('_id', $ocupiedRoomsId)->paginate(6);
        }
        $roomsData->appends(['arrivalDate' => $in, 'departureDate' => $out])->links();
        $rooms = $this->formateRooms($roomsData);
        $baseUrl = "roomDetails?arrivalDate={$in}&departureDate={$out}&id=";
        return view('roomsList', [
            'rooms' => $rooms,
            'checkIn' => $in,
            'checkOut' => $out,
            'order' => $order,
            'baseUrl' => $baseUrl,
            'icons' => icons(),
        ]);
    }

    public function show()
    {
        $id = request('id');
        $in = request('arrivalDate') ? request('arrivalDate') : '';
        $out = request('departureDate') ? request('departureDate') : '';
        if (!$id) return redirect('/');
        $room = Room::find($id);
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
        $booking = [
            'checkIn' => $in,
            'checkOut' => $out,
            'guest' => '',
            'email' => '',
            'phone' => '',
            'message' => '',
            'roomId' => '',
        ];
        $relatedRoomsData = Room::all()->skip(3)->take(2);
        $relatedRooms = $this->formateRooms($relatedRoomsData);
        return view("roomDetails", [
            "room" => $room,
            'booking' => $booking,
            'inputErrors' => $inpuptErrors,
            'hasError' => false,
            'sentForm' => false,
            'postMessage' => '',
            'amenities' => amenities(),
            'classOfferPrice' => $presentationPrice,
            'icons' => icons(),
            'relatedRooms' => $relatedRooms
        ]);
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
