<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryClient\StoreDeliveryClientRequest;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\Enum\DeliveryStatusEnum;
use App\Models\Transaction;

class DeliveryCLientController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::paginate(10);
        return view('public.delivery.index', compact('deliveries'));
    }

    public function create()
    {
        $user = auth()->user();
        $deliveries = $user->deliveries()
            ->orderBy('number', 'DESC')
            ->where('status', DeliveryStatusEnum::OPEN->value)
            ->get();
        $clients = $user->clients;
        $products = $user->products;

        return view('public.delivery-client.create', compact('deliveries', 'clients', 'products'));
    }

    public function store(StoreDeliveryClientRequest $request)
    {
        $data = $request->validated();

        foreach ($data['delivery_items'] as $item) {
            $params = $data;
            $price = $item['price_for_unit'] ?? auth()->user()->products()->where('products.id', $item['product_id'])->first()->pivot->price;
            $params['product_id'] = $item['product_id'] ;
            $params['amount'] = str_replace(',','.', $item['amount']);
            $params['price_for_unit'] = str_replace(',','.', $price);
            unset($params['delivery_items']);

            Transaction::create($params);
        }

        return redirect()->route('delivery.show', $data['model_id']);
    }

    public function showDeliveryClient(Delivery $delivery, Client $client)
    {
        $deliveryClients = $delivery->transactions()->where('client_id', $client->id)->get();
        $totalMoney = $deliveryClients->map(function ($item) {
            $item->total = $item->amount * $item->price_for_unit;
            return $item;
        })->sum('total');

        return view('public.delivery-client.show', compact('delivery','client','deliveryClients', 'totalMoney'));
    }

    public function close(Delivery $delivery, Client $client)
    {
        $delivery->transactions()->where('client_id', $client->id)->update([
            'status' => DeliveryStatusEnum::CLOSE->value,
        ]);

        return redirect()->route('delivery.index');
    }
}
