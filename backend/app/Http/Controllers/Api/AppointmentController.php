<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $items = Appointment::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return AppointmentResource::collection($items);
    }

    public function store(AppointmentRequest $request)
    {
        $item = Appointment::create($request->validated());

        return (new AppointmentResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new AppointmentResource(Appointment::findOrFail($id));
    }

    public function update(AppointmentRequest $request, string $id)
    {
        $item = Appointment::findOrFail($id);
        $item->update($request->validated());

        return new AppointmentResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Appointment::findOrFail($id)->delete();

        return response()->noContent();
    }
}
