<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EarringRequest;
use App\Http\Resources\EarringResource;
use App\Models\Earring;
use Illuminate\Http\Request;

class EarringController extends Controller
{
    public function index(Request $request)
    {
        $items = Earring::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return EarringResource::collection($items);
    }

    public function store(EarringRequest $request)
    {
        $item = Earring::create($request->validated());

        return (new EarringResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new EarringResource(Earring::findOrFail($id));
    }

    public function update(EarringRequest $request, string $id)
    {
        $item = Earring::findOrFail($id);
        $item->update($request->validated());

        return new EarringResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Earring::findOrFail($id)->delete();

        return response()->noContent();
    }
}
