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
    
        return view('home', compact('topShows'));
    }
}
