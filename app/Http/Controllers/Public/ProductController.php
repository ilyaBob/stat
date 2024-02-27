<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Requests\ProductsAm\StoreAmProductRequest;
use App\Http\Requests\ProductsAm\UpdateAmProductRequest;
use App\Models\Product;
use App\Models\ProductUser;

class ProductController extends Controller
{
    public function index()
    {
        $products = auth()->user()->products()->orderBy('product_users.price', 'ASC')->paginate(10);
        return view('public.product.index', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('public.product.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $user = auth()->user();
        $price = $data['price'];

        $user->products()->updateExistingPivot($product, ['price' => $price]);

        return redirect()->route('products.index');
    }
}
