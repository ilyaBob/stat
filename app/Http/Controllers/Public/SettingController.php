<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Models\Product;

class SettingController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('public.settings.index', compact('products'));
    }

    public function store(StoreSettingRequest $request)
    {
        $data = $request->validated();

        $this->customSync($data['products']);
        return redirect()->back();
    }

    public function customSync($data): void
    {
        $user = auth()->user();

        if (isset($data)) {
            $user->products()->whereNotIn('id', $data)->detach();

            $productIds = array_diff($data, $user->refresh()->products->pluck('id')->toArray());
            $user->products()->attach($productIds);
        }
    }

}
