<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CollectionRequest;
use App\Http\Resources\CollectionResource;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $items = Collection::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return CollectionResource::collection($items);
    }

    public function store(CollectionRequest $request)
    {
        $item = Collection::create($request->validated());

        return (new CollectionResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new CollectionResource(Collection::findOrFail($id));
    }

    public function update(CollectionRequest $request, string $id)
    {
        $item = Collection::findOrFail($id);
        $item->update($request->validated());

        return new CollectionResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Collection::findOrFail($id)->delete();

        return response()->noContent();
    }
}
