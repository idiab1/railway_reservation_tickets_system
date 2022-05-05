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
        $servationsCount = User::all()->count();
        $reservations = Reservation::all();
        return view('admin.adminHome', compact("userCount", "trainsCount", "servationsCount", "reservations"));
    }

}
