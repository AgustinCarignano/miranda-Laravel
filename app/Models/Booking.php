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
}
