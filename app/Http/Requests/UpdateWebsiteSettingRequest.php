<?php

namespace App\Http\Requests;

use App\Models\WebsiteSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWebsiteSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('website_setting_edit');
    }

    public function rules()
    {
        return [
            'site_name' => [
                'string',
                'required',
            ],
        ];
    }
}
