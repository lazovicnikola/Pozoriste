<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\ShowTime;

class HomeController extends Controller
{
    public function topShows()
    {
        $topShows = ShowTime::withCount('reservations', 'show')
            ->orderBy('reservations_count', 'desc')
            ->take(5)
            ->get();

        $latestShows = Show::latest()->take(5)
            ->orderBy('created_at', 'desc')
            ->groupBy('title')
            ->get();

        return view('home', compact('topShows', 'latestShows'));
    }

}
