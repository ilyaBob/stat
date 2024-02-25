<?php

namespace App\Http\Requests\Setting;

class StoreSettingRequest extends AbstractSettingRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
