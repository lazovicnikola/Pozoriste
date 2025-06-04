<?php

namespace App\Http\Controllers;


use App\Models\Reservation;
use App\Models\Seat;
use App\Models\Show;
use App\Models\ShowTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class ShowController extends Controller
{
    public function index(Request $request)
    {


        $query = ShowTime::with(['hall', 'show'])->withCount('reservations');


        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('show', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('director', 'like', "%{$search}%");
            });
        }

        if ($request->filled('date')) {
            $date = $request->input('date');
            $query->where('date', $date);
        }

        if ($request->input('sort') === 'popular') {
            $query->orderByDesc('reservations_count');
        }


        $shows = $query->orderBy('date')
            ->orderBy('start_time')
            ->simplePaginate(6);

        return view('shows.index', [
            'shows' => $shows
        ]);
    }



    public function show($id)
    {
        $showId = $id;

        $show = Show::with('showTimes.hall.seats')->findOrFail($showId);
        $showTime = ShowTime::where('show_id', $showId)->first();

        if (!$showTime) {
            abort(404, 'Showtime not found');
        }

        $allSeats = Seat::where('hall_id', $showTime->hall_id)->count();

        $reservedSeats = Reservation::where('show_time_id', $showTime->id)->count();

        $availableSeats = $allSeats - $reservedSeats;

        return view('shows.show', [
            'show' => $show,
            'showTime' => $showTime,
            'availableSeats' => $availableSeats
        ]);
    }


    public function edit(Show $show)
    {

        $show = ShowTime::with('show')->where('show_id', $show->id)->first();

        return view('shows.edit', [

            'show' => $show
        ]);
    }

    public function update(Request $request, Show $show)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'director' => 'required',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_time' => 'required',
            'date' => 'required|string|after_or_equal:today',
        ]);


        $exists = ShowTime::where('date', $request->date)
            ->where('start_time', $request->start_time)
            ->where('hall_id', $request->hall_id)
            ->where('show_id', '!=', $show->id)
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'date' => "Već postoji predstava za datum $request->date u $request->start_time."
            ]);
        }


        $imagePath = $show->image_path;


        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('show_images', 'public');
        }

        Show::findOrFail($show->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'user_id' => $request->user_id,
            'image_path' => $imagePath
        ]);

        ShowTime::where('show_id', $show->id)->update([
            'hall_id' => $request->hall_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'price' => $request->price
        ]);


        return redirect()->route('shows.show', ['show' => $show->id])->with('success', 'Show updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'director' => 'required',
            'hall_id' => 'required',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_time' => 'required',
            'dates' => 'required|string',
        ]);

        $dates = explode(',', $request->dates);
        $dates = array_map('trim', $dates);


        foreach ($dates as $date) {

            if (strtotime($date) < strtotime(date('Y-m-d'))) {
                return back()->withErrors([
                    'dates' => "Datum $date mora biti danas ili u budućnosti."
                ])->withInput();
            }

            $exists = ShowTime::where('date', $date)
                ->where('start_time', $request->start_time)
                ->where('hall_id', $request->hall_id)
                ->exists();

            if ($exists) {
                return back()->withErrors([
                    'dates' => "Već postoji predstava za datum $date u $request->start_time."
                ]);
            }
        }

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('show_images', 'public');
        }


        foreach ($dates as $date) {
            $show = Show::create([
                'title' => $request->title,
                'description' => $request->description,
                'director' => $request->director,
                'user_id' => Auth::id(),
                'image_path' => $imagePath,
            ]);

            ShowTime::create([
                'show_id' => $show->id,
                'hall_id' => $request->hall_id,
                'date' => $date,
                'start_time' => $request->start_time,
                'price' => $request->price,
            ]);
        }

        return redirect()->route('shows')
            ->with('success', 'Sve predstave i termini su uspješno kreirani.');
    }


    public function reservations(Show $show)
    {
        $reservations = $show->showTimes()
            ->with('reservations')
            ->get()
            ->flatMap(function ($showTime) {
                return $showTime->reservations;
            });

        return view('shows.reservations', compact('show', 'reservations'));
    }


    public function create(Show $show)
    {
        return view('shows.create', compact('show'));
    }

    public function destroy(Show $show)
    {
        $show->delete();
        return redirect()->route('shows')->with('success', 'Predstava ' . $show->title . ' je uspješno izbrisana.');
    }

    public function deleteOldShows()
    {
        $deleted = ShowTime::where('date', '<', now()->toDateString())->delete();
        return redirect()->back()->with('success', "$deleted predstave su izbrisane koje su starije od danas.");
    }
}
