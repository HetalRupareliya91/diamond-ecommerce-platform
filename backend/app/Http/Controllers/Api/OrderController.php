<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $items = Order::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return OrderResource::collection($items);
    }

    public function store(OrderRequest $request)
    {
        $item = Order::create($request->validated());

        return (new OrderResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new OrderResource(Order::findOrFail($id));
    }

    public function update(OrderRequest $request, string $id)
    {
        $item = Order::findOrFail($id);
        $item->update($request->validated());

        return new OrderResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();

        return response()->noContent();
    }
}
