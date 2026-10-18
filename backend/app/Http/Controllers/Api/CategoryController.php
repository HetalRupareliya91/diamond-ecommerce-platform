<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $items = Category::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return CategoryResource::collection($items);
    }

    public function store(CategoryRequest $request)
    {
        $item = Category::create($request->validated());

        return (new CategoryResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new CategoryResource(Category::findOrFail($id));
    }

    public function update(CategoryRequest $request, string $id)
    {
        $item = Category::findOrFail($id);
        $item->update($request->validated());

        return new CategoryResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        return response()->noContent();
    }
}
