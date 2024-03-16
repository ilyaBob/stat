@php
    use  App\Models\Enum\DeliveryStatusEnum;

    /**
    * @var \App\Models\Delivery[] $deliveries
    */
@endphp

@extends('layouts.admin')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Доставка</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Доставка</li>
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
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-1">
                                        <a class="btn btn-success" href="{{ route('delivery.create') }}">Добавить</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Номер</th>
                                        <th>Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deliveries as $delivery)
                                        <tr>
                                            <td>
                                                <a href="{{route('delivery.show',$delivery->id)}}">{{$delivery->number}}</a>
                                            </td>

                                            <td>
                                                @if($delivery->status == DeliveryStatusEnum::OPEN->value)
                                                    <span class="btn bg-success">{{DeliveryStatusEnum::toString($delivery->status)}}</span>
                                                @else
                                                    <span class="btn bg-warning">{{DeliveryStatusEnum::toString($delivery->status)}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $deliveries->withQueryString()->links('includes.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
