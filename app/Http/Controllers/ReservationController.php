<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function storeBookind(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:start_date',
        ]);
        
        $existingReservation = Reservation::where('room_id', $request->room_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                      ->orWhereBetween('check_out', [$request->check_in, $request->check_out]);
            })
            ->exists();
        if ($existingReservation) {
            return back()->withErrors([
                'room_id' => 'La salle est déjà réservée pour ces dates.',
            ]);
        }
        $reservation = Reservation::create([
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => false,
        ]);

        return redirect()->route('home.roomDetails', $reservation->room_id)->with('success', 'Réservation réussie !');
    }
      
}
