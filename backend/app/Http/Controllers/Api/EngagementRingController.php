<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EngagementRingRequest;
use App\Http\Resources\EngagementRingResource;
use App\Models\EngagementRing;
use Illuminate\Http\Request;

class EngagementRingController extends Controller
{
    public function index(Request $request)
    {
        $items = EngagementRing::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return EngagementRingResource::collection($items);
    }

    public function store(EngagementRingRequest $request)
    {
        $item = EngagementRing::create($request->validated());

        return (new EngagementRingResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new EngagementRingResource(EngagementRing::findOrFail($id));
    }

    public function update(EngagementRingRequest $request, string $id)
    {
        $item = EngagementRing::findOrFail($id);
        $item->update($request->validated());

        return new EngagementRingResource($item->refresh());
    }

    public function destroy(string $id)
    {
        EngagementRing::findOrFail($id)->delete();

        return response()->noContent();
    }
}
