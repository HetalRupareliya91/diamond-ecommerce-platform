<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiamondClarityRequest;
use App\Http\Resources\DiamondClarityResource;
use App\Models\DiamondClarity;
use Illuminate\Http\Request;

class DiamondClarityController extends Controller
{
    public function index(Request $request)
    {
        $items = DiamondClarity::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return DiamondClarityResource::collection($items);
    }

    public function store(DiamondClarityRequest $request)
    {
        $item = DiamondClarity::create($request->validated());

        return (new DiamondClarityResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new DiamondClarityResource(DiamondClarity::findOrFail($id));
    }

    public function update(DiamondClarityRequest $request, string $id)
    {
        $item = DiamondClarity::findOrFail($id);
        $item->update($request->validated());

        return new DiamondClarityResource($item->refresh());
    }

    public function destroy(string $id)
    {
        DiamondClarity::findOrFail($id)->delete();

        return response()->noContent();
    }
}
