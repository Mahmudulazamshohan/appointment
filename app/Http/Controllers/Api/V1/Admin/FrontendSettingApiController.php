<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\FrontendSetting;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFrontendSettingRequest;
use App\Http\Requests\UpdateFrontendSettingRequest;
use App\Http\Resources\Admin\FrontendSettingResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontendSettingApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('frontend_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FrontendSettingResource(FrontendSetting::all());
    }

    public function store(StoreFrontendSettingRequest $request)
    {
        $frontendSetting = FrontendSetting::create($request->all());

        if ($request->input('logo', false)) {
            $frontendSetting->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        return (new FrontendSettingResource($frontendSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FrontendSetting $frontendSetting)
    {
        abort_if(Gate::denies('frontend_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FrontendSettingResource($frontendSetting);
    }

    public function update(UpdateFrontendSettingRequest $request, FrontendSetting $frontendSetting)
    {
        $frontendSetting->update($request->all());

        if ($request->input('logo', false)) {
            if (!$frontendSetting->logo || $request->input('logo') !== $frontendSetting->logo->file_name) {
                $frontendSetting->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($frontendSetting->logo) {
            $frontendSetting->logo->delete();
        }

        return (new FrontendSettingResource($frontendSetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FrontendSetting $frontendSetting)
    {
        abort_if(Gate::denies('frontend_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frontendSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
