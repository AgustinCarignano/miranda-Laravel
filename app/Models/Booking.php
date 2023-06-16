<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Model::withoutTimestamps(fn () => $post->increment(['reads']));
//Model::preventSilentlyDiscardingAttributes(!$this->app->isProduction());

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
}
