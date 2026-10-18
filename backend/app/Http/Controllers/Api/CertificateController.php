<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $items = Certificate::query()
            ->search($request->query('search'))
            ->latest()
            ->paginate((int) $request->query('per_page', 15));

        return CertificateResource::collection($items);
    }

    public function store(CertificateRequest $request)
    {
        $item = Certificate::create($request->validated());

        return (new CertificateResource($item))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new CertificateResource(Certificate::findOrFail($id));
    }

    public function update(CertificateRequest $request, string $id)
    {
        $item = Certificate::findOrFail($id);
        $item->update($request->validated());

        return new CertificateResource($item->refresh());
    }

    public function destroy(string $id)
    {
        Certificate::findOrFail($id)->delete();

        return response()->noContent();
    }
}
