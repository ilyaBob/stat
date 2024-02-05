<?php

namespace App\Http\Requests\Products;

class StoreProductRequest extends AbstractProductRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
