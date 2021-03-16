<?php

namespace App\Http\Requests;

use App\Models\PageLayout;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePageLayoutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_layout_edit');
    }

    public function rules()
    {
        return [
            'page_id'   => [
                'required',
                'integer',
            ],
            'module_id' => [
                'required',
                'integer',
            ],
            'ordering'  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
