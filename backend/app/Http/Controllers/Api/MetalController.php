<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MetalRequest;
use App\Http\Resources\MetalResource;
use App\Models\Metal;
use Illuminate\Http\Request;

class MetalController extends Controller
{
    public function index(Request $request)
    {
        $items = Metal::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return MetalResource::collection($items);
    }

    public function store(MetalRequest $request)
    {
        $item = Metal::create($request->validated());

        return (new MetalResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new MetalResource(Metal::findOrFail($id));
    }

    public function update(MetalRequest $request, string $id)
    {
        $item = Metal::findOrFail($id);
        $item->update($request->validated());

        return new MetalResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Metal::findOrFail($id)->delete();

        return response()->noContent();
    }
}
