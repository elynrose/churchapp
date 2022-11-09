<?php

namespace App\Http\Requests;

use App\Models\VideoExcerpt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVideoExcerptRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('video_excerpt_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'preached_by' => [
                'string',
                'required',
            ],
            'date_preached' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'video_file' => [
                'required',
            ],
            'ordering' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
