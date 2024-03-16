<?php

namespace App\Http\Requests\DeliveryClient;

use App\Http\Requests\Trade\AbstractTradeRequest;

class StoreDeliveryClientRequest extends AbstractTradeRequest
{

    public function prepareForValidation()
    {
        return $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'integer|required',
            'model_id' => 'integer|required|min:1',
            'model_type' => 'string|required',
            'client_id' => 'integer|required|exists:App\Models\Client,id',
            'delivery_items' => 'array|required',
            'delivery_items.*.product_id' => 'integer|required|exists:App\Models\Product,id',
            'delivery_items.*.amount' => 'string|required',
            'delivery_items.*.price_for_unit' => 'string|nullable',
        ];
    }
}
