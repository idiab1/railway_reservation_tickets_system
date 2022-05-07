<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin_home()
    {
        $userCount = User::all()->count();
        $trainsCount = Train::all()->count();
        $servationsCount = Reservation::all()->count();
        $passengersCount = User::with("roles")->whereHas("roles", function($q){
            $q->whereIn("name", ["passenger"]);
        })->count();

        // Get all reservations
        $reservations = Reservation::all();
        return view('admin.adminHome', compact("userCount", "trainsCount", "servationsCount", "passengersCount" , "reservations"));
    }

}
