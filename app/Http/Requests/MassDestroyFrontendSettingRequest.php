<?php

namespace App\Http\Requests;

use App\FrontendSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFrontendSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('frontend_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:frontend_settings,id',
        ];
    }
}
