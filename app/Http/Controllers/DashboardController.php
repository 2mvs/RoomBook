<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $spotifyCredentials = ['email' =>'joseprocrack83@gmail.com', 'password' => 'Mat040505@'];

        $countRoom = Room::count();
        return view('dashboard.statistic', [
           'countRoom' => $countRoom,
           'countBooking' => Reservation::count(),
           'countUser' => User::where('role', '!=', 'admin')->count(),
        ]);

    }
}
