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
    protected $fillable = ['user_id', 'title', 'description', 'director', 'image_path'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showTimes()
    {
        return $this->hasMany(ShowTime::class);
    }

}
