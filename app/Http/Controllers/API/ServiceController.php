<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::where('status', true)->get();
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'boolean'
        ]);

        $service = Service::create($data);
        return response()->json($service);
    }

    public function update(Request $request, Service $service)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'name' => 'required', 'price' => 'required|numeric',
            'description' => 'nullable|string', 'status' => 'boolean'
        ]);

        $service->update($data);
        return response()->json($service);
    }

    public function destroy(Service $service)
    {
        $this->authorizeAdmin();
        $service->delete();
        return response()->json(['message' => 'Deleted']);
    }

    protected function authorizeAdmin()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Only admin allowed');
        }
    }
}

