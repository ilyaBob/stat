<?php

namespace App\Http\Requests\Trade;

class StoreTradeRequest extends AbstractTradeRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
