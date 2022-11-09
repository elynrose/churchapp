<?php

namespace App\Http\Requests;

use App\Models\Qotd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQotdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qotd_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
