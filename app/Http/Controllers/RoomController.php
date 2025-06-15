<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function getRooms()
    {
        $rooms = Room::latest()->get();
        return view('room.room', [
            'rooms' => $rooms,
        ]);
    }

    public function roomForm()
    {
        return view('room.add', [
            'categories' => Category::all()
        ]);
    }

    public function createRoom(Request $request)
    {
       $datas = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'location' => 'required|string|max:255',
            'price'=> 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string|min:3',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string'
        ]);

        $room = Room::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'price'=> $request->price,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('public/rooms');
                $room->images()->create([
                    'path' => Storage::url($path)
                ]);
            }
        }

        return redirect()->back()->with('success', 'Salle créée avec succès.');
    }
    public function editRoom(Room $room)
    {
        return view('room.editRoom', [
            'room' => $room,
        ]);
    }
    // public function showRoom(Room $room)
    // {
    //     return view('room.showRoom', [
    //         'room' => $room,
    //     ]);
    // }
    public function updateRoom(Request $request, Room $room)
    {
       $datas = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price'=> 'nullable|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string|min:3',
            'status' => 'required|string'
        ]);

        $room->update($datas);

        // return redirect()->to_route('')->with('success', 'Salle mise à jour avec succès.');
        return to_route('admin.room')->with('success', 'Salle mise à jour avec succès.');
    }
    public function deleteRoom(Room $room)
    {
        $room->delete();

        return redirect()->back()->with('success', 'Salle supprimée avec succès.');
    }
}
