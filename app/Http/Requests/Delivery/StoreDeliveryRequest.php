<?php

namespace App\Http\Requests\Delivery;

use App\Http\Requests\Trade\AbstractTradeRequest;

class StoreDeliveryRequest extends AbstractTradeRequest
{
    protected function prepareForValidation()
    {
        $user = auth()->user();
        $number = $user->deliveries()->orderBy('number', 'DESC')->first()->number;
        $this->merge([
            'user_id' => $user->id,
            'status' => 1,
            'number' => ++$number,
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
            'status' => 'integer|required',
            'number' => 'integer|required',
            'date_start' => 'string|required',
        ];
    }
}
