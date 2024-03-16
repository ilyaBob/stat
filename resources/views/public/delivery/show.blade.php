@php
    /**
    * @var \App\Models\Client[] $clientOpens
    * @var \App\Models\Client[] $clientCloses
    */
@endphp

@extends('layouts.admin')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Клиенты в доставке</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="/">Доставка</a></li>
                            <li class="breadcrumb-item active">Клиенты в доставке</li>
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
                                    <div class="col-5 col-md-1">
                                        <a class="btn btn-success"
                                           href="{{ route('delivery-client.create') }}">Добавить</a>
                                    </div>
                                    <div class="col-7 col-md-2 ml-md-1">
                                        <form
                                            action="{{route('delivery.close', $delivery->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-warning text-white">
                                                Закрыть доставку
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>На доставку</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clientOpens as $client)
                                        <tr>
                                            <td>
                                                <a href="{{route('delivery-client.show-delivery-client',['delivery' => $delivery->id, 'client' => $client->id])}}">{{$client->name}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Доставлено</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clientCloses as $client)
                                        <tr>
                                            <td>
                                                <a href="{{route('delivery-client.show-delivery-client',['delivery' => $delivery->id, 'client' => $client->id])}}">{{$client->name}}</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
