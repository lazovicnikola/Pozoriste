<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    public $timestamps = true; 
    protected $table = "seats";
    protected $fillable = ['row', 'number', 'is_reserved', 'show_id'];

    public function show() {
        return $this->belongsTo(Show::class);
    }
}
