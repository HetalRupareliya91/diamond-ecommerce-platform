<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShipmentRequest;
use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        $items = Shipment::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return ShipmentResource::collection($items);
    }

    public function store(ShipmentRequest $request)
    {
        $item = Shipment::create($request->validated());

        return (new ShipmentResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new ShipmentResource(Shipment::findOrFail($id));
    }

    public function update(ShipmentRequest $request, string $id)
    {
        $item = Shipment::findOrFail($id);
        $item->update($request->validated());

        return new ShipmentResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Shipment::findOrFail($id)->delete();

        return response()->noContent();
    }
}
