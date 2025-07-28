<?php

namespace App\Services;

use App\Models\Service;

class ServiceService
{
    public function getAllAvailable()
    {
        return Service::where('status', true)->get();
    }

    public function create(array $data)
    {
        return Service::create($data);
    }

    public function update(Service $service, array $data)
    {
        $service->update($data);
        return $service;
    }

    public function delete(Service $service)
    {
        $service->delete();
        return true;
    }
}
