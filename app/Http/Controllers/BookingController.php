<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create()
    {
        $rooms = Room::all();
        return view('booking.form', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $room = Room::findOrFail($request->room_id);

        $days = Carbon::parse($request->check_in)
            ->diffInDays(Carbon::parse($request->check_out));

        $total = $days * $room->price;

        Booking::create([
            'user_id' => auth()->id(), // Using the authenticated user's ID

            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_amount' => $total,
        ]);

        return redirect()->back()->with('success','Room booked successfully!');
    }
}