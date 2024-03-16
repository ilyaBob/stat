@php
    /**
    * @var \App\Models\Delivery[] $deliveries
    * @var \App\Models\Client[] $clients
    * @var \App\Models\Product[] $products
    */
@endphp
@extends('layouts.admin')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить клиента</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="/">Клиенты</a></li>
                            <li class="breadcrumb-item active">Добавить клиента</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Заполните форму</h3>
                            </div>
                            <form
                                action="{{ route('delivery-client.store') }}"
                                method="POST">
                                @csrf
                                @method("POST")
                                <div class="card-body">
                                    <input hidden name="model_type" value="delivery">
                                    <x-select column="number" name="model_id" label="Номер доставки"
                                              :dataArray="$deliveries"/>
                                    <x-select column="name" name="client_id" label="Клиент" :dataArray="$clients"/>

                                    <div class="container-custom">
                                        <div class="bg-gray-light p-3 mb-4 rounded product-contain" id="js-initial" style="border: 1px solid #d1d1d1;">
                                            <x-select column="title" name="delivery_items[0][product_id]" label="Продукт" id="product" :dataArray="$products" />
                                            <x-input name="delivery_items[0][amount]" label="Количество" id="amount" placeholder="Количество"/>
                                            <x-input name="delivery_items[0][price_for_unit]" label="Цена" id="price" placeholder="Цена"/>
                                            <span class="btn btn-danger js-delete">Удалить</span>
                                        </div>
                                    </div>

                                    <span class="btn btn-success js-add" id="add-product">Добавить продукт</span>
                            </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
