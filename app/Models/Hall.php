<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;
    public $timestamps = true; 
    protected $table = "halls";
    protected $fillable = ['name', 'type', 'capacity'];

    public function shows() {
        return $this->hasMany(Show::class);
    }

    public function seats() {
        return $this->hasMany(Seat::class);
    }
}
