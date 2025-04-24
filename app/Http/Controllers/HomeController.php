<?php

namespace App\Http\Controllers;

use App\Models\Show;

class HomeController extends Controller
{
    public function topShows()
    {
        $topShows = Show::withCount('reservations')
            ->orderBy('reservations_count', 'desc') 
            ->take(5)
            ->get();
    
        return view('home', compact('topShows'));
    }
}
