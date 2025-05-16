<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seat;
use App\Models\ShowTime;


class SeatController extends Controller
{
    public function index($showId)
    {
        $show = ShowTime::with('hall')->findOrFail($showId);
        $seats = Seat::where('hall_id', $show->hall_id)->get()->groupBy('row');
        $showTimeIds = ShowTime::where('show_id', $showId)->pluck('id');
        $reservedSeats = Reservation::whereIn('show_time_id', $showTimeIds)->pluck('seat_id')->toArray();


        return view('seats.index', compact('show', 'seats', 'reservedSeats'));
    }

    public function show($seatId)
    {
        $seat = Seat::findOrFail($seatId);
        $show = ShowTime::with('seats')->findOrFail($seat->show_id);
        return view('seats.show', compact('seat', 'show'));
    }
}
