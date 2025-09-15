<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_type' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        // Save booking to database
        Booking::create([
            'user_id' => Auth::id(),
            'service_type' => $request->service_type,
            'booking_date' => $request->booking_date,
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking successfully made!');
    }
}
