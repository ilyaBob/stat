@php
    /**
    * @var \App\Models\Trade[] $tradeProducts
    */
@endphp

@extends('layouts.admin')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Итого</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Итого</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <table id="" class="table table-bordered table-striped">
                                    <tr>
                                        <td colspan="2"><h3 class="m-0">Продано</h3></td>
                                    </tr>
                                    @foreach($tradeProducts['items'] as $product)
                                        <tr>
                                            <td>{{ $product['title'] }}</td>
                                            <td>({{$product['total_product_sold']}}
                                                {{$product['unit']}})
                                                <br>{{ number_format($product['total_price_product'], 0, ',', ' ') }}
                                                р
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"><h3 class="m-0">Остатки</h3></td>
                                    </tr>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach($tradeProducts['items'] as $product)
                                        @if($product['total_volume_remaining_product'] != 0)
                                            @php
                                                $count++;
                                            @endphp
                                            <tr>
                                                <td>{{ $product['title'] }}</td>
                                                <td>{{ $product['total_volume_remaining_product'] }} {{$product['unit']}}</td>
                                            </tr>
                                        @endif
                                        @if($loop->last && empty($count))
                                            <tr>
                                                <td colspan="2">Остатков нет</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td colspan="2"><h3 class="m-0">Итого</h3></td>
                                    </tr>
                                    <tr>
                                        <td>Итого</td>
                                        <td>{{ number_format($tradeProducts['total_price'], 0, ',', ' ') }} р</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
