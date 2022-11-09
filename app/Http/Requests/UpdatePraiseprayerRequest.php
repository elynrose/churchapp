<?php

namespace App\Http\Requests;

use App\Models\Praiseprayer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePraiseprayerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('praiseprayer_edit');
    }

    public function rules()
    {
        return [
            'select_type' => [
                'required',
            ],
            'full_name' => [
                'string',
                'required',
            ],
            'on_behalf_of' => [
                'string',
                'nullable',
            ],
            'date_submitted' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
