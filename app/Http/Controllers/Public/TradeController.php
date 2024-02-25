<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trade\StoreTradeRequest;
use App\Http\Requests\Trade\UpdateTradeRequest;
use App\Models\Enum\TradeEnum;
use App\Models\Product;
use App\Models\Trade;
use App\Models\TradeProduct;
use Illuminate\Support\Facades\DB;

class TradeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if($user->products()->wherePivotNull('price')->count() > 0){
            return view('public.trade.emptyProduct');
        }

        $trades = Trade::query()->where('user_id', $user->id)->paginate(10);

        return view('public.trade.index', compact('trades'));
    }

    public function create()
    {
        $products = auth()->user()->products;

        return view('public.trade.create', compact('products'));
    }

    public function store(StoreTradeRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        $trade = Trade::create([
            'status' => TradeEnum::STATUS_START,
            'user_id' => auth()->user()->id,
        ]);

        $tradeProductsData = [];

        foreach ($data['products'] as $productId => $amount) {
            if (isset($amount)) {
                $amount = str_replace(',', '.', $amount);
                $tradeProductsData[] = [
                    'trade_id' => $trade->id,
                    'product_id' => $productId,
                    'initial_quantity' => $amount,
                    'price_for_unit' => Product::find($productId)->getPrice(),
                    'created_at' => date('Y-m-d H:m:s'),
                ];
            }
        }

        TradeProduct::query()->insert($tradeProductsData);
        DB::commit();

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
