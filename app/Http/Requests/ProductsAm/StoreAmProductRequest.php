<?php

namespace App\Http\Requests\ProductsAm;

class StoreAmProductRequest extends AbstractAmProductRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
