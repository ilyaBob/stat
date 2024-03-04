<?php

namespace App\Http\Requests\Client;

class UpdateClientRequest extends AbstractClientRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
