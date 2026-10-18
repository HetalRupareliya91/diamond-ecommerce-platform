<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BraceletRequest;
use App\Http\Resources\BraceletResource;
use App\Models\Bracelet;
use Illuminate\Http\Request;

class BraceletController extends Controller
{
    public function index(Request $request)
    {
        $items = Bracelet::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return BraceletResource::collection($items);
    }

    public function store(BraceletRequest $request)
    {
        $item = Bracelet::create($request->validated());

        return (new BraceletResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new BraceletResource(Bracelet::findOrFail($id));
    }

    public function update(BraceletRequest $request, string $id)
    {
        $item = Bracelet::findOrFail($id);
        $item->update($request->validated());

        return new BraceletResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Bracelet::findOrFail($id)->delete();

        return response()->noContent();
    }
}
