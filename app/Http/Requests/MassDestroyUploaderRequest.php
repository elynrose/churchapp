<?php

namespace App\Http\Requests;

use App\Models\Uploader;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUploaderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('uploader_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:uploaders,id',
        ];
    }
}
