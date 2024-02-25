<?php

namespace App\Http\Requests\ProductsAm;

use Illuminate\Foundation\Http\FormRequest;

class AbstractAmProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|required',
            'quantity_per_unit' => 'required|numeric|required',
            'unit' => 'required|string|required',
        ];
    }
}
