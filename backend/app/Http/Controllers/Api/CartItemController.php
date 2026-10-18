<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItemRequest;
use App\Http\Resources\CartItemResource;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index(Request $request)
    {
        $items = CartItem::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return CartItemResource::collection($items);
    }

    public function store(CartItemRequest $request)
    {
        $item = CartItem::create($request->validated());

        return (new CartItemResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new CartItemResource(CartItem::findOrFail($id));
    }

    public function update(CartItemRequest $request, string $id)
    {
        $item = CartItem::findOrFail($id);
        $item->update($request->validated());

        return new CartItemResource($item->refresh());
    }

    public function destroy(string $id)
    {
        CartItem::findOrFail($id)->delete();

        return response()->noContent();
    }
}
