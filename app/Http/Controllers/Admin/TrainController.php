<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Station;
use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all data of trains
        $trains = Train::all();
        return view('admin.trains.index', compact('trains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all data of stations
        $stations = Station::all();
        return view('admin.trains.create', compact('stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate on all data coming from request
        $this->validate($request, [
            'name'                  => ['required', 'string'],
            'train_type'            => ['required', 'string'],
            'seats_count'           => ['required', 'integer'],
            'depature_station_id'   => ['required'],
            'depature_at'           => ['required', 'date'],
            'arrival_station_id'    => ['required'],
            'arrival_at'            => ['required', 'date'],
        ]);

        $depature_station = Station::find($request->depature_station_id);
        $arrival_station = Station::find($request->arrival_station_id);

        // Save data to train table
        $train = Train::create([
            "name" => $request->name,
            "train_type" => $request->train_type,
            "seats_count" => $request->seats_count,
            "depature_station" => $depature_station->name,
            "arrival_station" => $arrival_station->name,
            "depature_at" => $request->depature_at,
            "arrival_at" => $request->arrival_at,
        ]);

        $train->stations()->attach([$request->depature_station_id, $request->arrival_station_id]);

        // Redirect to homepage of trains
        return redirect()->route('trains.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
