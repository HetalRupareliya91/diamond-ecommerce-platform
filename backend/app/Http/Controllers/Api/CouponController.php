<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $items = Coupon::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return CouponResource::collection($items);
    }

    public function store(CouponRequest $request)
    {
        $item = Coupon::create($request->validated());

        return (new CouponResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new CouponResource(Coupon::findOrFail($id));
    }

    public function update(CouponRequest $request, string $id)
    {
        $item = Coupon::findOrFail($id);
        $item->update($request->validated());

        return new CouponResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Coupon::findOrFail($id)->delete();

        return response()->noContent();
    }
}
