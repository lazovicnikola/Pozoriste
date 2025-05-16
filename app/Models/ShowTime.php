<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'hall_id',
        'date',
        'start_time',
        'price',
    ];

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
