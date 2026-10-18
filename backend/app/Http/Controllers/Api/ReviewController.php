<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $items = Review::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return ReviewResource::collection($items);
    }

    public function store(ReviewRequest $request)
    {
        $item = Review::create($request->validated());

        return (new ReviewResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new ReviewResource(Review::findOrFail($id));
    }

    public function update(ReviewRequest $request, string $id)
    {
        $item = Review::findOrFail($id);
        $item->update($request->validated());

        return new ReviewResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Review::findOrFail($id)->delete();

        return response()->noContent();
    }
}
