<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trade\StoreTradeRequest;
use App\Http\Requests\Trade\UpdateTradeRequest;
use App\Models\Enum\TradeEnum;
use App\Models\Product;
use App\Models\Trade;
use App\Models\TradeProduct;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::query()->paginate(10);

        return view('public.trade.index', compact('trades'));
    }

    public function create()
    {
        $products = Product::all();

        return view('public.trade.create', compact('products'));
    }

    public function store(StoreTradeRequest $request)
    {
        $data = $request->validated();

        $trade = Trade::create([
            'status' => TradeEnum::STATUS_START
        ]);

        $tradeProductsData = [];

        foreach ($data['products'] as $productId => $amount) {
            if (isset($amount)) {
                $tradeProductsData[] = [
                    'trade_id' => $trade->id,
                    'product_id' => $productId,
                    'initial_quantity' => $amount,
                    'price_for_unit' => Product::find($productId)->price,
                ];
            }
        }

        TradeProduct::query()->insert($tradeProductsData);

        return redirect()->route('trade.index');
    }

    public function show(Trade $trade)
    {

        $tradeProducts = $trade->getProductsInfo();

        return view('public.trade.show', compact('tradeProducts'));
    }

    public function edit(Trade $trade)
    {
        if ($trade->status == 2) {
            return redirect()->back();
        }
        $tradeProducts = TradeProduct::query()->with('products')->where('trade_id', $trade->id)->get();
        return view('public.trade.edit', compact('tradeProducts', 'trade'));
    }

    public function update(UpdateTradeRequest $request, Trade $trade)
    {
        $trade->update([
            'status' => TradeEnum::STATUS_FINAL
        ]);

        $data = $request->validated();

        $tradeProductsData = [];

        foreach ($data['products'] as $productId => $amount) {
            if (isset($amount)) {
                $tradeProductsData[] = [
                    'trade_id' => $trade->id,
                    'product_id' => $productId,
                    'final_quantity' => $amount,
                ];
            }
        }

        // TODO Добавить поле price в TradeProduct, оставить остатки так как есть сейчас. Оптимизировать код.

        foreach ($tradeProductsData as $trade) {
            TradeProduct::query()
                ->where('trade_id', $trade['trade_id'])
                ->where('product_id', $trade['product_id'])
                ->update(['final_quantity' => $trade['final_quantity']]);
        }

        return redirect()->route('trade.index');
    }

    public function destroy(Trade $trade)
    {
        //
    }
}
