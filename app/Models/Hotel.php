<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    // use HasFactory;
    protected $fillable = [
        'name', 'category_id', 'address', 'tel', 'image', 'check_in', 'check_out', 'remarks', 'prefecture',
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function plans(){
        return $this->hasMany(Plan::class);
    }
    
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
