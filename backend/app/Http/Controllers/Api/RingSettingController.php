<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RingSettingRequest;
use App\Http\Resources\RingSettingResource;
use App\Models\RingSetting;
use Illuminate\Http\Request;

class RingSettingController extends Controller
{
    public function index(Request $request)
    {
        $items = RingSetting::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return RingSettingResource::collection($items);
    }

    public function store(RingSettingRequest $request)
    {
        $item = RingSetting::create($request->validated());

        return (new RingSettingResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new RingSettingResource(RingSetting::findOrFail($id));
    }

    public function update(RingSettingRequest $request, string $id)
    {
        $item = RingSetting::findOrFail($id);
        $item->update($request->validated());

        return new RingSettingResource($item->refresh());
    }

    public function destroy(string $id)
    {
        RingSetting::findOrFail($id)->delete();

        return response()->noContent();
    }
}
