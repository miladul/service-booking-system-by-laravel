<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Services\BookingService;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    protected BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(BookingRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $data = array_merge($validated, [
            'user_id' => auth()->id(),
            'status' => 'pending',
        ]);

        $booking = $this->bookingService->create($data);

        return $this->successResponse(
            new BookingResource($booking),
            'Booking created successfully',
            201
        );
    }

    public function index(): JsonResponse
    {
        $bookings = $this->bookingService->getUserBookings(auth()->user());

        return $this->successResponse(
            BookingResource::collection($bookings),
            'Your bookings'
        );
    }

    public function allBookings(): JsonResponse
    {
        if (!auth()->user()->is_admin) {
            return $this->errorResponse('Only admin allowed', 403);
        }

        $bookings = $this->bookingService->getAllBookings();

        return $this->successResponse(
            BookingResource::collection($bookings),
            'All bookings'
        );
    }

    protected function successResponse(mixed $data, string $message = '', int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    protected function errorResponse(string $message = 'Something went wrong', int $status = 400, mixed $errors = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }
}
