<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeddingBandRequest;
use App\Http\Resources\WeddingBandResource;
use App\Models\WeddingBand;
use Illuminate\Http\Request;

class WeddingBandController extends Controller
{
    public function index(Request $request)
    {
        $items = WeddingBand::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return WeddingBandResource::collection($items);
    }

    public function store(WeddingBandRequest $request)
    {
        $item = WeddingBand::create($request->validated());

        return (new WeddingBandResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new WeddingBandResource(WeddingBand::findOrFail($id));
    }

    public function update(WeddingBandRequest $request, string $id)
    {
        $item = WeddingBand::findOrFail($id);
        $item->update($request->validated());

        return new WeddingBandResource($item->refresh());
    }

    public function destroy(string $id)
    {
        WeddingBand::findOrFail($id)->delete();

        return response()->noContent();
    }
}
