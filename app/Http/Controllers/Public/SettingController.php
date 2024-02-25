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

            $userProducts = $user->products;

            $onDelete = [];
            foreach ($userProducts as $userProduct) {
                if (!in_array($userProduct->id, $data)) {
                    $onDelete[] = $userProduct->id;
                }
            }

            $user->products()->detach($onDelete);

            $productIds = array_diff($data, $user->refresh()->products->pluck('id')->toArray());
            $user->products()->attach($productIds);

        }


    }

}
