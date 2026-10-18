<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiamondShapeRequest;
use App\Http\Resources\DiamondShapeResource;
use App\Models\DiamondShape;
use Illuminate\Http\Request;

class DiamondShapeController extends Controller
{
    public function index(Request $request)
    {
        $items = DiamondShape::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return DiamondShapeResource::collection($items);
    }

    public function store(DiamondShapeRequest $request)
    {
        $item = DiamondShape::create($request->validated());

        return (new DiamondShapeResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new DiamondShapeResource(DiamondShape::findOrFail($id));
    }

    public function update(DiamondShapeRequest $request, string $id)
    {
        $item = DiamondShape::findOrFail($id);
        $item->update($request->validated());

        return new DiamondShapeResource($item->refresh());
    }

    public function destroy(string $id)
    {
        DiamondShape::findOrFail($id)->delete();

        return response()->noContent();
    }
}
