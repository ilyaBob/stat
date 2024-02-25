<?php

namespace App\Http\Requests\ProductsAm;

class UpdateAmProductRequest extends AbstractAmProductRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
