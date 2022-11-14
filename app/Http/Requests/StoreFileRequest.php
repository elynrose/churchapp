<?php

namespace App\Http\Requests;

use App\Models\File;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('file_create');
    }

    public function rules()
    {
        return [
            'section_id' => [
                'required',
                'integer',
            ],
            'file_name' => [
                'string',
                'required',
            ],
            'file' => [
                'required',
            ],
            'file_type' => [
                'required',
            ],
        ];
    }
}
