<?php

namespace App\Http\Requests;

use App\Models\Qotd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQotdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qotd_edit');
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
