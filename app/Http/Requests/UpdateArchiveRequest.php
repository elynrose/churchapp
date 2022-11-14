<?php

namespace App\Http\Requests;

use App\Models\Archive;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateArchiveRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('archive_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'language' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'date_preached' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'video_url' => [
                'string',
                'nullable',
            ],
            'audio_url' => [
                'string',
                'nullable',
            ],
            'pdf_file' => [
                'string',
                'nullable',
            ],
        ];
    }
}
