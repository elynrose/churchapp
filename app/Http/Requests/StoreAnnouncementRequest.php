<?php

namespace App\Http\Requests;

use App\Models\Announcement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAnnouncementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('announcement_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'description' => [
                'required',
            ],
            'expires_on' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'files' => [
                'array',
            ],
        ];
    }
}
