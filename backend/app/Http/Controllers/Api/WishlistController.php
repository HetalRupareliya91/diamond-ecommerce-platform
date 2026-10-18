<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WishlistRequest;
use App\Http\Resources\WishlistResource;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $items = Wishlist::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return WishlistResource::collection($items);
    }

    public function store(WishlistRequest $request)
    {
        $item = Wishlist::create($request->validated());

        return (new WishlistResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new WishlistResource(Wishlist::findOrFail($id));
    }

    public function update(WishlistRequest $request, string $id)
    {
        $item = Wishlist::findOrFail($id);
        $item->update($request->validated());

        return new WishlistResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Wishlist::findOrFail($id)->delete();

        return response()->noContent();
    }
}
