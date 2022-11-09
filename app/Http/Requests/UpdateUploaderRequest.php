<?php

namespace App\Http\Requests;

use App\Models\Uploader;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUploaderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('uploader_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'date_preached' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'preached_by' => [
                'string',
                'required',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'file_code' => [
                'string',
                'required',
                'unique:uploaders,file_code,' . request()->route('uploader')->id,
            ],
            'coconut_job_code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
