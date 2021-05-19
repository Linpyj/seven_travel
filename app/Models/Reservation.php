<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // use HasFactory;
    protected $fillable = [
        'user_id', 'plan_id', 'check_in', 'check_out', 'status',
    ];

    public function user(){
        return $this->belongosTo(User::class);
    }
}
