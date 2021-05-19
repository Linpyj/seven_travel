<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // use HasFactory;
    protected $fillable = [
        'name', 'hotel_id', 'price', 'number_of_room', 'remarks',
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
