<?php

namespace App\Http\Requests\Products;

class UpdateProductRequest extends AbstractProductRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
