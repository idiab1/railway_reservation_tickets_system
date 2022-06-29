<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Train;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
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
        // Get all data of types of trains
        $types = Type::all();
        return view("tickets.index", compact("trains", "types"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view("tickets.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    public function ticketSearch(Request $request){
        // dd($request);

        $depature_station = Station::find($request->depature_station_id);
        $arrival_station = Station::find($request->arrival_station_id);
        // dd($depature_station->name);

        $trains = Train::where("depature_station", 'like', '%' . $depature_station->name . '%')
        ->orWhere("arrival_station", 'like', '%' . $arrival_station->name . '%')
        ->orWhere("depature_at", 'like', '%' . $request->depature_at . '%')
        ->orWhere("arrival_at", 'like', '%' . $request->arrival_at . '%')
        ->get();

        // $trains = DB::table('trains')
        // ->where("depature_station", 'like', '%' . $depature_station->name . '%')
        // ->where(function ($query, $arrival_station) {
        //     $query->where("arrival_station", 'like', '%' . $arrival_station->name . '%');
        // })
        // ->get();
        return view("tickets.search", compact("trains"));

    }



}
