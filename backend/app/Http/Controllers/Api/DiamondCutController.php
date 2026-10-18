<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiamondCutRequest;
use App\Http\Resources\DiamondCutResource;
use App\Models\DiamondCut;
use Illuminate\Http\Request;

class DiamondCutController extends Controller
{
    public function index(Request $request)
    {
        $items = DiamondCut::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return DiamondCutResource::collection($items);
    }

    public function store(DiamondCutRequest $request)
    {
        $item = DiamondCut::create($request->validated());

        return (new DiamondCutResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new DiamondCutResource(DiamondCut::findOrFail($id));
    }

    public function update(DiamondCutRequest $request, string $id)
    {
        $item = DiamondCut::findOrFail($id);
        $item->update($request->validated());

        return new DiamondCutResource($item->refresh());
    }

    public function destroy(string $id)
    {
        DiamondCut::findOrFail($id)->delete();

        return response()->noContent();
    }
}
