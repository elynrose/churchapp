<?php

namespace App\Http\Requests;

use App\Models\HomepageCarousel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHomepageCarouselRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('homepage_carousel_create');
    }

    public function rules()
    {
        return [
            'photo' => [
                'required',
            ],
            'headline' => [
                'string',
                'nullable',
            ],
            'sub_heading' => [
                'string',
                'nullable',
            ],
            'link_to' => [
                'string',
                'nullable',
            ],
            'order' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
