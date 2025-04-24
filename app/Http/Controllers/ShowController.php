<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Show;
use Illuminate\Http\Request;



class ShowController extends Controller
{
    public function index()
    {

        $show = Show::with('user', 'hall')->latest()->simplePaginate(5);


        return view('shows.index', [
            'shows' => $show
        ]);
    }



    public function show($id)
    {
        $showId = $id;
        $show = Show::with('user')->find($showId);

        return view('shows.show', [
            'show' => $show
        ]);
    }

    public function edit(Show $show)      
    {
        $show = Show::findOrFail($show->id);

        return view('shows.edit', [
            'show' => $show
        ]);
    }
    
    public function update(Request $request, Show $show) {


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'director' => 'required',
            'hall_id' => 'required',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'base_price' => 'required',
            'user_id' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('show_images', 'public');
        }

        Show::findOrFail($show->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'hall_id' => $request->hall_id,
            'base_price' => $request->base_price,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'user_id' => $request->user_id,
            'image_path' => $imagePath
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
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'base_price' => 'required',
            'user_id' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('show_images', 'public');
        }


        $show =  Show::create([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'hall_id' => $request->hall_id,
            'base_price' => $request->base_price,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'user_id' => $request->user_id,
            'image_path' => $imagePath
        ]);


        return redirect()->route('shows.show', ['show' => $show->id])->with('success', 'Show created successfully.');
    }

    public function create(Show $show)
    {
        return view('shows.create', compact('show'));
    }
}
