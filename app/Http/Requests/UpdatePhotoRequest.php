<?php

namespace App\Http\Requests;

use App\Models\Photo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePhotoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('photo_edit');
    }

    public function rules()
    {
        return [
            'photos' => [
                'array',
                'required',
            ],
            'photos.*' => [
                'required',
            ],
            'album_id' => [
                'required',
                'integer',
            ],
        ];
    }
}