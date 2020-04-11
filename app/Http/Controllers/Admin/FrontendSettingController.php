<?php

namespace App\Http\Controllers\Admin;

use App\FrontendSetting;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFrontendSettingRequest;
use App\Http\Requests\StoreFrontendSettingRequest;
use App\Http\Requests\UpdateFrontendSettingRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FrontendSettingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        
        abort_if(Gate::denies('frontend_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frontendSettings = FrontendSetting::all();

        return view('admin.frontendSettings.index', compact('frontendSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('frontend_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frontendSettings.create');
    }

    public function store(StoreFrontendSettingRequest $request)
    {
        $frontendSetting = FrontendSetting::create($request->all());

        if ($request->input('logo', false)) {
            $frontendSetting->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $frontendSetting->id]);
        }

        return redirect()->route('admin.frontend-settings.index');
    }

    public function edit(FrontendSetting $frontendSetting)
    {
        abort_if(Gate::denies('frontend_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frontendSettings.edit', compact('frontendSetting'));
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

        return redirect()->route('admin.frontend-settings.index');
    }

    public function show(FrontendSetting $frontendSetting)
    {
        abort_if(Gate::denies('frontend_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frontendSettings.show', compact('frontendSetting'));
    }

    public function destroy(FrontendSetting $frontendSetting)
    {
        abort_if(Gate::denies('frontend_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frontendSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyFrontendSettingRequest $request)
    {
        FrontendSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('frontend_setting_create') && Gate::denies('frontend_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FrontendSetting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
