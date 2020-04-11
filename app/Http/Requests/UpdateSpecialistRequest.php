<?php

namespace App\Http\Requests;

use App\Specialist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSpecialistRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'category_id.*'   => [
                'required',
                'integer',
            ],
            'opening_time'  => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'closing_time'  => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'occupied'      => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
