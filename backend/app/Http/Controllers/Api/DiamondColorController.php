<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiamondColorRequest;
use App\Http\Resources\DiamondColorResource;
use App\Models\DiamondColor;
use Illuminate\Http\Request;

class DiamondColorController extends Controller
{
    public function index(Request $request)
    {
        $items = DiamondColor::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return DiamondColorResource::collection($items);
    }

    public function store(DiamondColorRequest $request)
    {
        $item = DiamondColor::create($request->validated());

        return (new DiamondColorResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new DiamondColorResource(DiamondColor::findOrFail($id));
    }

    public function update(DiamondColorRequest $request, string $id)
    {
        $item = DiamondColor::findOrFail($id);
        $item->update($request->validated());

        return new DiamondColorResource($item->refresh());
    }

    public function destroy(string $id)
    {
        DiamondColor::findOrFail($id)->delete();

        return response()->noContent();
    }
}
