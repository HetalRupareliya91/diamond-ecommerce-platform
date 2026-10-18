<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiamondRequest;
use App\Http\Resources\DiamondResource;
use App\Models\Diamond;
use Illuminate\Http\Request;

class DiamondController extends Controller
{
    public function index(Request $request)
    {
        $items = Diamond::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return DiamondResource::collection($items);
    }

    public function store(DiamondRequest $request)
    {
        $item = Diamond::create($request->validated());

        return (new DiamondResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new DiamondResource(Diamond::findOrFail($id));
    }

    public function update(DiamondRequest $request, string $id)
    {
        $item = Diamond::findOrFail($id);
        $item->update($request->validated());

        return new DiamondResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Diamond::findOrFail($id)->delete();

        return response()->noContent();
    }
}
