<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NecklaceRequest;
use App\Http\Resources\NecklaceResource;
use App\Models\Necklace;
use Illuminate\Http\Request;

class NecklaceController extends Controller
{
    public function index(Request $request)
    {
        $items = Necklace::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return NecklaceResource::collection($items);
    }

    public function store(NecklaceRequest $request)
    {
        $item = Necklace::create($request->validated());

        return (new NecklaceResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new NecklaceResource(Necklace::findOrFail($id));
    }

    public function update(NecklaceRequest $request, string $id)
    {
        $item = Necklace::findOrFail($id);
        $item->update($request->validated());

        return new NecklaceResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Necklace::findOrFail($id)->delete();

        return response()->noContent();
    }
}
