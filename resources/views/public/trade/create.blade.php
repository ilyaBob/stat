@php
    /**
    * @var \App\Models\Product[] $products
    */
@endphp

@extends('main.index')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить продукты</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="/">Продукты</a></li>
                            <li class="breadcrumb-item active">Добавить продукты</li>
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
                                action="{{ route('trade.store') }}"
                                method="POST">
                                @csrf
                                @method("POST")
                                <div class="card-body">

                                    @foreach($products as $product)
                                        <x-input
                                            name="products[{{$product->id}}]"
                                            label="{{ $product->title }}"
                                            id="title" placeholder="{{ $product->unit }}"
                                        />
                                    @endforeach

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
