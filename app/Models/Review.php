<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //use HasFactory;
    protected $fillable = [
        'hotel_id', 'title', 'content', 
    ];

    public function reviews(){
        return $this->belongsTo(Review::class);
    }
}
