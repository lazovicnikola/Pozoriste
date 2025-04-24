<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seat;
use App\Models\Show;


class SeatController extends Controller
{
    public function index($showId)
    {
        $show = Show::with('hall')->findOrFail($showId);
        $seats = Seat::where('hall_id', $show->hall_id)->get()->groupBy('row');
        $reservedSeats = Reservation::where('show_id', $showId)->pluck('seat_id')->toArray();

        return view('seats.index', compact('show', 'seats', 'reservedSeats'));
    }

    public function show($seatId)
    {
        $seat = Seat::findOrFail($seatId);
        $show = Show::with('seats')->findOrFail($seat->show_id);

        return view('seats.show', compact('seat', 'show'));
    }
}
