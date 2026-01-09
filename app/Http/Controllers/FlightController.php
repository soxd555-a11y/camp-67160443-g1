<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['flight'] = Flight::all();
        return view('flights.index', $data);
    }

  public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'image' => 'required|image'
    ]);

    $file = $request->file('image');
    $filename = time().'.'.$file->getClientOriginalExtension();
    $file->storeAs('images', $filename, 'public');

    Flight::create([
        'name' => $request->name,
        'type' => $request->type,
        'species' => $request->species,
        'height' => $request->height,
        'weight' => $request->weight,
        'hp' => $request->hp,
        'attack' => $request->attack,
        'defense' => $request->defense,
        'image_url' => 'images/'.$filename,
    ]);

    return redirect('/flights');
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        $data['flight_update'] = $flight;
        $data['flight'] = Flight::all();

        return view('flights.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Flight $flight)
{
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('images', $filename, 'public');

        $flight->image_url = 'images/'.$filename;
    }

    $flight->update([
        'name' => $request->name,
        'type' => $request->type,
        'species' => $request->species,
        'height' => $request->height,
        'weight' => $request->weight,
        'hp' => $request->hp,
        'attack' => $request->attack,
        'defense' => $request->defense,
    ]);

    return redirect('/flights');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect('/flights');
    }
}
