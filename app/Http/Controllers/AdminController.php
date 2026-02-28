<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class AdminController extends Controller
{
    public function allBookings()
    {
        $bookings = Booking::with(['user','room'])->get();
        return view('admin.report', compact('bookings'));
    }
}