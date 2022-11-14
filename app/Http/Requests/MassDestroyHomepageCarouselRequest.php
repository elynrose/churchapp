<?php

namespace App\Http\Requests;

use App\Models\HomepageCarousel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHomepageCarouselRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('homepage_carousel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:homepage_carousels,id',
        ];
    }
}
