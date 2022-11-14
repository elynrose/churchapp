<?php

namespace App\Http\Requests;

use App\Models\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_edit');
    }

    public function rules()
    {
        return [
            'page_title' => [
                'string',
                'required',
            ],
            'content' => [
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:pages,slug,' . request()->route('page')->id,
            ],
            'cover_image' => [
                'required',
            ],
            'thumb_image' => [
                'array',
            ],
        ];
    }
}
