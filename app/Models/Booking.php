<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['guest', 'specialRequest', 'orderDate', 'status', 'checkIn', 'checkOut', 'roomId'];
    static function createBooking($booking)
    {
        $newBooking = [
            'guest' => $booking['guest'],
            'specialRequest' => $booking['message'],
            'orderDate' => date("Y-m-d H:i:s"),
            'status' => 'Check In',
            'checkIn' => $booking['checkIn'],
            'checkOut' => $booking['checkOut'],
            'roomId' => $booking['roomId']
        ];
        return Booking::create($newBooking);
    }
    static function occupiedRooms($in, $out)
    {
        $ocupiedRoomsData = Booking::select('roomId')->where("checkIn", ">=", $in)->where("checkIn", "<=", $out)
            ->orWhere("checkOut", ">=", $in)->where("checkOut", "<=", $out)
            ->orWhere("checkIn", ">=", $in)->where("checkOut", "<=", $out)
            ->orWhere("checkIn", "<=", $in)->where("checkOut", ">=", $out)->get();
        $ocupiedRoomsId = [];
        foreach ($ocupiedRoomsData as $room) {
            $ocupiedRoomsId[] = $room['roomId'];
        }
        return $ocupiedRoomsId;
    }
}
