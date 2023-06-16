<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Booking;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::formatAllRooms(Room::all()->take(8));
        return view('index', ['rooms' => $rooms, 'icons' => Helpers::$icons, 'facilities' => Helpers::$facilities, 'menues' => Helpers::$menues]);
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
        $rooms = Room::formatAllRooms($rooms);
        return view('roomsGrid', ['rooms' => $rooms, 'order' => $order, 'icons' => Helpers::$icons]);
    }

    public function offerRooms()
    {
        $rooms = Room::formatAllRooms(Room::where('offer', "1")->get());
        $popularRooms = Room::formatAllRooms(Room::all()->take(3));
        return view('offers', ['rooms' => $rooms, 'amenities' => Helpers::$amenities, 'popularRooms' => $popularRooms]);
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
        $rooms = Room::formatAllRooms($roomsData);
        $baseUrl = "roomDetails?arrivalDate={$in}&departureDate={$out}&id=";
        return view('roomsList', [
            'rooms' => $rooms,
            'checkIn' => $in,
            'checkOut' => $out,
            'order' => $order,
            'baseUrl' => $baseUrl,
            'icons' => Helpers::$icons,
            // 'icons' => icons(),
        ]);
    }

    public function show()
    {
        $id = request('id');
        $in = request('arrivalDate') ? request('arrivalDate') : '';
        $out = request('departureDate') ? request('departureDate') : '';
        if (!$id) return redirect('/');
        $room = Room::formatOneRoom(Room::find($id));
        $presentationPrice = $room['offer'] === 1 ? "pageDetailsPresentation__prices offerPrice" : "pageDetailsPresentation__prices";
        $relatedRooms = Room::formatAllRooms(Room::where('roomType', $room['roomType'])->whereNotIn('_id', [$room['_id']])->take(2)->get());
        return view("roomDetails", [
            "room" => $room,
            'bookingsDates' => ['checkIn' => $in, 'checkOut' => $out],
            'classOfferPrice' => $presentationPrice,
            'relatedRooms' => $relatedRooms
        ]);
    }
}
