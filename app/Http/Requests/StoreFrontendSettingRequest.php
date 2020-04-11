<?php

namespace App\Http\Requests;

use App\FrontendSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreFrontendSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('frontend_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
