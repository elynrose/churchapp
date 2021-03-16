<?php

namespace App\Http\Requests;

use App\Models\App;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAppRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('app_edit');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
