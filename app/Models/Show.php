<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Seat;


class Show extends Model
{
    use HasFactory;
    protected $table = "show_listings";
    protected $fillable = ['base_price','hall_id', 'description', 'title', 'start_time', 'date', 'user_id', 'venue', 'director', 'image_path'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function hall() {
        return $this->belongsTo(Hall::class);
    }
}
