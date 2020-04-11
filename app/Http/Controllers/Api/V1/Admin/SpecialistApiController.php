<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSpecialistRequest;
use App\Http\Requests\UpdateSpecialistRequest;
use App\Http\Resources\Admin\SpecialistResource;
use App\Specialist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpecialistApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('specialist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SpecialistResource(Specialist::with(['specialist', 'category'])->get());
    }

    public function store(StoreSpecialistRequest $request)
    {
        $specialist = Specialist::create($request->all());

        if ($request->input('image', false)) {
            $specialist->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new SpecialistResource($specialist))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SpecialistResource($specialist->load(['specialist', 'category']));
    }

    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        $specialist->update($request->all());

        if ($request->input('image', false)) {
            if (!$specialist->image || $request->input('image') !== $specialist->image->file_name) {
                $specialist->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($specialist->image) {
            $specialist->image->delete();
        }

        return (new SpecialistResource($specialist))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
