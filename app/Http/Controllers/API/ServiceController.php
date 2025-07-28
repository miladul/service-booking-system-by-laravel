<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        return response()->json($this->serviceService->getAllAvailable());
    }

    public function store(ServiceRequest $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validated();

        $service = $this->serviceService->create($validated);

        return response()->json($service, 201);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $this->authorizeAdmin();

        $validated = $request->validated();

        $updated = $this->serviceService->update($service, $validated);

        return response()->json($updated);
    }

    public function destroy(Service $service)
    {
        $this->authorizeAdmin();

        $this->serviceService->delete($service);

        return response()->json(['message' => 'Deleted']);
    }

    protected function authorizeAdmin()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Only admin allowed');
        }
    }
}


