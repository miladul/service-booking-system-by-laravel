<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    protected ServiceService $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index(): JsonResponse
    {
        $services = $this->serviceService->getAllAvailable();

        return $this->successResponse(
            ServiceResource::collection($services),
            'All services'
        );
    }

    public function store(ServiceRequest $request): JsonResponse
    {
        if (!auth()->user()->is_admin) {
            return $this->errorResponse('Only admin allowed', 403);
        }

        $validated = $request->validated();

        $service = $this->serviceService->create($validated);

        return $this->successResponse(
            new ServiceResource($service),
            'Service created successfully',
            201
        );
    }

    public function update(ServiceRequest $request, Service $service): JsonResponse
    {
        if (!auth()->user()->is_admin) {
            return $this->errorResponse('Only admin allowed', 403);
        }

        $validated = $request->validated();

        $updated = $this->serviceService->update($service, $validated);

        return $this->successResponse(
            new ServiceResource($updated),
            'Service updated successfully'
        );
    }

    public function destroy(Service $service): JsonResponse
    {
        if (!auth()->user()->is_admin) {
            return $this->errorResponse('Only admin allowed', 403);
        }

        $this->serviceService->delete($service);

        return $this->successResponse([], 'Service deleted successfully');
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
