@php
    /**
    * @var \App\Models\Transaction[] $deliveryClients
    */
@endphp

@extends('layouts.admin')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$client->name}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Доставка клиенту</li>
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
                                    <div class="col-7 col-md-2 ml-md-1">
                                        <form
                                            action="{{route('delivery-client.close',['delivery' => $delivery->id, 'client' => $client->id])}}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-warning text-white">
                                                Доставлено
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Товар</th>
                                        <th>Итого</th>
                                        <th>Количество</th>
                                        <th>Цена за ед</th>
                                    </tr>
                                    </thead>
                                    @foreach($deliveryClients as $deliveryClient)
                                        <tr>
                                            <td><span>{{$deliveryClient->product->title}}</span></td>
                                            <td>
                                                <span>{{$deliveryClient->amount * $deliveryClient->price_for_unit}}</span>
                                            </td>
                                            <td><span>{{"$deliveryClient->amount {$deliveryClient->product->unit}"}} </span></td>
                                            <td><span>{{$deliveryClient->price_for_unit}}</span></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td><span>Итого</span></td>
                                        <td>{{$totalMoney}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>

    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "info": true,
                "order": [[1, 'asc']],
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
