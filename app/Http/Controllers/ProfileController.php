<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Show;
use App\Models\ShowTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {

        $query = User::where('id', '!=', Auth::user()->id);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->simplePaginate(6);

        $reservations = Reservation::where('user_id', Auth::user()->id)
            ->groupBy('show_time_id')->get();

        return view('profile.index', [
            'users' => $users,
            'reservations' => $reservations
        ]);
    }


    public function show(User $user)
    {
        $user = User::find($user->id);
        $reservations = Reservation::where('user_id', $user->id)
            ->groupBy('show_time_id')
            ->with(['showTime.hall', 'showTime.show', 'seat'])
            ->get();


        return view('profile.show', [
            'user' => $user,
            'reservations' => $reservations
        ]);
    }

    public function review(Show $show, User $user)
    {

        $showTimeIds = ShowTime::where('show_id', $show->id)->pluck('id');


        $reservations = Reservation::whereIn('show_time_id', $showTimeIds)
            ->where('user_id', $user->id)
            ->with(['showTime.hall', 'showTime.show', 'seat'])
            ->get();

        return view('profile.review', [
            'show' => $show,
            'reservations' => $reservations
        ]);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return back()->with('success', 'Sjediste je otkazano.');
    }
}
