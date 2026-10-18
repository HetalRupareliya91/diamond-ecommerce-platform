<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $items = Payment::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return PaymentResource::collection($items);
    }

    public function store(PaymentRequest $request)
    {
        $item = Payment::create($request->validated());

        return (new PaymentResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new PaymentResource(Payment::findOrFail($id));
    }

    public function update(PaymentRequest $request, string $id)
    {
        $item = Payment::findOrFail($id);
        $item->update($request->validated());

        return new PaymentResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Payment::findOrFail($id)->delete();

        return response()->noContent();
    }
}
