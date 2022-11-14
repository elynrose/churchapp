<?php

namespace App\Http\Requests;

use App\Models\SisterChurch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSisterChurchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sister_church_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'link_to' => [
                'string',
                'required',
            ],
            'photo' => [
                'required',
            ],
        ];
    }
}
