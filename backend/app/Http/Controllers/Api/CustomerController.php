<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $items = Customer::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return CustomerResource::collection($items);
    }

    public function store(CustomerRequest $request)
    {
        $item = Customer::create($request->validated());

        return (new CustomerResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new CustomerResource(Customer::findOrFail($id));
    }

    public function update(CustomerRequest $request, string $id)
    {
        $item = Customer::findOrFail($id);
        $item->update($request->validated());

        return new CustomerResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Customer::findOrFail($id)->delete();

        return response()->noContent();
    }
}
