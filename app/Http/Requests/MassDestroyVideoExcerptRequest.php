<?php

namespace App\Http\Requests;

use App\Models\VideoExcerpt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVideoExcerptRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('video_excerpt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:video_excerpts,id',
        ];
    }
}
