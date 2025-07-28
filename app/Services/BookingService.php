<?php

namespace App\Services;

use App\Models\Booking;

class BookingService
{
    public function create(array $data)
    {
        return Booking::create($data);
    }

    public function getUserBookings($user)
    {
        return $user->bookings()->with('service')->get();
    }

    public function getAllBookings()
    {
        return Booking::with(['user', 'service'])->get();
    }
}
