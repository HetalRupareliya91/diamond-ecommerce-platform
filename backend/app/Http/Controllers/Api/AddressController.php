<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $items = Address::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return AddressResource::collection($items);
    }

    public function store(AddressRequest $request)
    {
        $item = Address::create($request->validated());

        return (new AddressResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new AddressResource(Address::findOrFail($id));
    }

    public function update(AddressRequest $request, string $id)
    {
        $item = Address::findOrFail($id);
        $item->update($request->validated());

        return new AddressResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Address::findOrFail($id)->delete();

        return response()->noContent();
    }
}
