<?php

namespace App\Http\Requests;

use App\Models\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_create');
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
                'unique:pages',
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
