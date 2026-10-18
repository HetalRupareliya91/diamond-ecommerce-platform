<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryItemRequest;
use App\Http\Resources\InventoryItemResource;
use App\Models\InventoryItem;
use Illuminate\Http\Request;

class InventoryItemController extends Controller
{
    public function index(Request $request)
    {
        $items = InventoryItem::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return InventoryItemResource::collection($items);
    }

    public function store(InventoryItemRequest $request)
    {
        $item = InventoryItem::create($request->validated());

        return (new InventoryItemResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new InventoryItemResource(InventoryItem::findOrFail($id));
    }

    public function update(InventoryItemRequest $request, string $id)
    {
        $item = InventoryItem::findOrFail($id);
        $item->update($request->validated());

        return new InventoryItemResource($item->refresh());
    }

    public function destroy(string $id)
    {
        InventoryItem::findOrFail($id)->delete();

        return response()->noContent();
    }
}
