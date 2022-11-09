<?php

namespace App\Http\Requests;

use App\Models\Qotd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQotdRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('qotd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:qotds,id',
        ];
    }
}
