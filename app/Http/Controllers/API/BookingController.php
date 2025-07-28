<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() // For Customer
    {
        $bookings = auth()->user()->bookings()->with('service')->get();
        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $data['service_id'],
            'booking_date' => $data['booking_date'],
            'status' => 'pending',
        ]);

        return response()->json($booking, 201);
    }

    public function allBookings() // For Admin
    {
        $this->authorizeAdmin();

        return Booking::with(['user', 'service'])->get();
    }

    protected function authorizeAdmin()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Only admin allowed');
        }
    }
}

