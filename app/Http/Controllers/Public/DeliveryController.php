<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery\StoreDeliveryRequest;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\Enum\DeliveryStatusEnum;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::orderBy('number', 'DESC')->paginate(10);

        return view('public.delivery.index', compact('deliveries'));
    }

    public function create()
    {
        return view('public.delivery.create');
    }

    public function store(StoreDeliveryRequest $request)
    {
        $data = $request->validated();
        Delivery::create($data);
        return redirect()->route('delivery.index');
    }

    public function show(Delivery $delivery)
    {
        $clientsOpenIds = $delivery->transactions()
            ->groupBy('client_id')
            ->where('status', DeliveryStatusEnum::OPEN->value)
            ->pluck('client_id');

        $clientsCloseIds = $delivery->transactions()
            ->groupBy('client_id')
            ->where('status', DeliveryStatusEnum::CLOSE->value)
            ->pluck('client_id');

        $clientOpens = Client::whereIn('id', $clientsOpenIds)->get();
        $clientCloses = Client::whereIn('id', $clientsCloseIds)->get();

        return view('public.delivery.show', compact('clientOpens','clientCloses', 'delivery'));
    }

    public function close(Delivery $delivery)
    {
        $delivery->update([
            'status' => DeliveryStatusEnum::CLOSE->value
        ]);

        return redirect()->route('delivery.index');
    }
}
