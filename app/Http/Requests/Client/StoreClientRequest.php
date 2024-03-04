<?php

namespace App\Http\Requests\Client;

class StoreClientRequest extends AbstractClientRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
