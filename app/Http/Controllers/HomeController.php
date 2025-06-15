<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function homeView()
   {
        $rooms = Room::all();
        return view('welcome', [
            'rooms' => $rooms,
        ]);
   }

   public function allRooms()
   {
        return view('home.rooms', [
            'rooms' => Room::where('status', 'Active')->orderBy('created_at', 'desc')->paginate(9),
            'categories' => Category::all()
        ]);
   } 

    public function roomDetails(Room $room)
    {
          return view('home.roomDetails', [
                'room' => $room,
          ]);
    }
}
