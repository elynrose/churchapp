<?php

namespace App\Http\Requests;

use App\Models\WeeksMessage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWeeksMessageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('weeks_message_create');
    }

    public function rules()
    {
        return [
            'week_of' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'message_titles' => [
                'required',
            ],
            'files' => [
                'array',
                'required',
            ],
            'files.*' => [
                'required',
            ],
        ];
    }
}
