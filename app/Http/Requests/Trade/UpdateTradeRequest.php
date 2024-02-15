<?php

namespace App\Http\Requests\Trade;

class UpdateTradeRequest extends AbstractTradeRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
