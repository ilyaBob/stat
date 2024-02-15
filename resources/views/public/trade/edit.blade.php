@php
    /**
    * @var \App\Models\TradeProduct[] $tradeProducts
    */
@endphp

@extends('main.index')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Внести остатки</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="/">Продукты</a></li>
                            <li class="breadcrumb-item active">Внести остатки</li>
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
                                action="{{ route('trade.update', ['trade' => $trade->id ]) }}"
                                method="POST">
                                @csrf
                                @method("PUT")
                                <div class="card-body">

                                    @foreach($tradeProducts as $tradeProduct)
                                        <x-input
                                            name="products[{{$tradeProduct->products->id}}]"
                                            label="{{ $tradeProduct->products->title }}"
                                            id="title" placeholder="{{ $tradeProduct->products->unit }}"
                                        />
                                    @endforeach

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Внести остатки</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
