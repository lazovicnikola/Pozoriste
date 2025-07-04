<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seat;
use App\Models\ShowTime;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{


    public function store(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Morate biti prijavljeni da biste rezervisali.');
        }

        $show = ShowTime::findOrFail($request->input('show_time_id'));
        $user_id = Auth::id();

        $ticketTypes = [
            'Regular' => 1,
            'Student' => 0.7,
        ];

        $reservations = [];

        foreach ($request->seat_ids as $index => $seatId) {
            $type = $request->type_hidden[$index] ?? 'Regular';
            $price = round($show->price * ($ticketTypes[$type] ?? 1), 2);

            $reservation = Reservation::create([
                'user_id' => $user_id,
                'show_time_id' => $show->id,
                'seat_id' => $seatId,
                'type' => $type,
                'price' => $price,
                'reservation_time' => now(),
            ]);

            $reservations[] = $reservation;
        }


        $pdf = Pdf::loadView('pdf.ticket', [
            'show' => $show,
            'user' => Auth::user(),
            'reservations' => $reservations
        ]);


        $pdf->save(storage_path('app/public/rezervacija.pdf'));

        session()->flash('success', 'Uspješno ste rezervisali karte. Preuzmite PDF ispod.');

        return redirect()->route('reservation.confirm');
    }


    public function confirmReservation(Request $request)
    {
        if (!$request->has('seat_ids') || empty($request->seat_ids)) {
            return redirect()->back()->with('error', 'Morate izabrati barem jedno sjedište.');
        }

        $showTime = ShowTime::where('show_id', $request->show_id)->firstOrFail();
        $seats = Seat::whereIn('id', $request->seat_ids)->get();

        return view('seats.confirm', [
            'showTime' => $showTime,
            'seats' => $seats,
        ]);
    }

    public function deleteOldReservations()
    {
        $deleted = Reservation::where('created_at', '<', now()->subHours(24))->delete();

        return redirect()->back()->with('success', "$deleted rezervacija je izbrisano koje su starije od 24h.");
    }
}
