<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $primaryKey = '_id';

    static function formatAllRooms($rooms)
    {
        foreach ($rooms as $room) {
            $room = Room::formatOneRoom($room);
        }
        return $rooms;
    }
    static function formatOneRoom($room)
    {
        $room['photos'] = explode(',', $room['photos']);
        $room['amenities'] = explode(',', $room['amenities']);
        return $room;
    }
    static function checkAvailability($roomId, $in, $out)
    {
        $ocupiedRooms = Booking::select('roomId')->where("checkIn", ">=", $in)->where("checkIn", "<=", $out)
            ->orWhere("checkOut", ">=", $in)->where("checkOut", "<=", $out)
            ->orWhere("checkIn", ">=", $in)->where("checkOut", "<=", $out)
            ->orWhere("checkIn", "<=", $in)->where("checkOut", ">=", $out)->get();
        $ocupiedRoomsId = [];
        foreach ($ocupiedRooms as $room) {
            $ocupiedRoomsId[] = $room['roomId'];
        }
        $isAvailable = in_array($roomId, $ocupiedRoomsId) ? false : true;
        return $isAvailable;
    }
}
