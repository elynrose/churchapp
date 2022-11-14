<?php

namespace App\Http\Requests;

use App\Models\SisterChurch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySisterChurchRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sister_church_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sister_churches,id',
        ];
    }
}
