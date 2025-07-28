<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $data = array_merge($validated, ['user_id' => auth()->id(), 'status' => 'pending']);

        $booking = $this->bookingService->create($data);

        return response()->json($booking, 201);
    }

    public function index()
    {
        $bookings = $this->bookingService->getUserBookings(auth()->user());

        return response()->json($bookings);
    }

    public function allBookings()
    {
        $this->authorizeAdmin();

        $bookings = $this->bookingService->getAllBookings();

        return response()->json($bookings);
    }

    protected function authorizeAdmin()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Only admin allowed');
        }
    }
}


