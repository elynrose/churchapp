<?php

namespace App\Http\Requests;

use App\Models\WeeksMessage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWeeksMessageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('weeks_message_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:weeks_messages,id',
        ];
    }
}
