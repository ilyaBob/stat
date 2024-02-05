<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        Product::create($data);
        return redirect()->route('admin.products-am.index');
    }

    public function edit(Product $products_am)
    {
        return view('admin.product.edit', compact('products_am'));
    }

    public function update(UpdateProductRequest $request, Product $products_am)
    {
        $data = $request->validated();
        $products_am->update($data);
        return redirect()->route('admin.products-am.index');
    }

    public function destroy(Product $products_am)
    {
        $products_am->delete();
        return redirect()->back();
    }
}
